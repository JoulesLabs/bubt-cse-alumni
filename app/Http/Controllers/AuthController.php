<?php

namespace App\Http\Controllers;

use App\Enums\MsgType;
use App\Exceptions\ModelCreateException;
use App\Models\User;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $auth,
        protected UserService $user,
    )
    {}

    /**
     * @return Factory|View|Application
     */
    public function loginPage(): Factory|View|Application
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function register(Request $request): view|RedirectResponse
    {

        try{
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'mobile' => 'required|min:11',
                'intake' => 'required|integer',
                'shift' => 'required',
                'reference' => 'required_with:reference_by' . ($request->input('reference_by') == 'email'? '|email|': '|') . 'exists:users,' . $request->input('reference_by'),
            ]);

            $data['status'] = 0;

            $user = $this->user->createUserWithInformation($request);
            auth()->login($user, true);
            $users = $this->user->adminGetAllUser();

            return view('dashboard', compact('users'))->with(msg("User created successfully!", MsgType::success));
        }catch(Exception $exception){
            return redirect()->back()->withInput()->with(msg($exception->getMessage(), MsgType::error));
        }
    }

    /**
     * @param Request $request
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user) {
            return redirect()->back()->with(msg("Email or password is incorrect!", MsgType::error));
        }

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with(msg("Email or password is incorrect!", MsgType::error));

    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * @return View|Factory|Application
     * @throws ModelCreateException
     */
    public function profile(): View|Factory|Application
    {
        $user = auth_user()->load('information.company', 'tags');
        //$reference = $this->user->findWithEmail($user->information->reference);

        return view('app.auth.profile', compact('user'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     * @throws ModelCreateException
     */
    public function guestProfile($id): View|Factory|Application
    {
        $user = $this->user->find($id);

        if(blank($user))
        {
            return view('guest.profile')->with([
                'error' => 'No user found here!'
            ]);
        }
        $reference = $this->user->findWithEmail($user->information->reference);

        return view('guest.profile', compact(['user', 'reference']));
    }

    public function updatePersonalInfo(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . auth_user()->id,
                'mobile' => 'required|min:11',
            ]);

            $user = auth_user();

            $user->fill($data);
            $user->save();
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->with(msg($exception->getMessage(), MsgType::error));
        }

        return redirect()->back()->with(msg("Personal info updated successfully!"));
    }

    public function changePassword(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            $user = auth_user();

            if (Hash::check($data['old_password'], $user->password)) {
                $user->password = $data['password'];
                $user->save();
            } else {
                throw new Exception("Old password is incorrect!");
            }
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->with(msg($exception->getMessage(), MsgType::error));
        }

        return redirect()->back()->with(msg("Password updated successfully!"));

    }

    public function updateProfessionalInfo(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'company' => 'required|numeric',
                'designation' => 'required',
                'skills' => 'required|array',
            ]);

            $data['company_id'] = $data['company'];

            $user = auth_user();
            $user->information->fill($data);
            $user->information->save();
            $user->tags()->sync($data['skills'] ?? []);
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->with(msg($exception->getMessage(), MsgType::error));
        }

        return redirect()->back()->with(msg("Professional info updated successfully!"));
    }

    public function updateContacts(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'lives' => 'nullable',
                'facebook' => 'nullable|url',
                'linkedin' => 'nullable|url',
            ]);

            $information = auth_user()->load('information')->information;

            $information->fill($data);
            $information->save();
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->with(msg($exception->getMessage(), MsgType::error));
        }

        return redirect()->back()->with(msg("Contact info updated successfully!"));
    }


}

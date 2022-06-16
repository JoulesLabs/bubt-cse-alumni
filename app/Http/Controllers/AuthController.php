<?php

namespace App\Http\Controllers;

use App\Exceptions\ModelCreateException;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                //'reference' => 'required|email|exists:users,email',
            ]);

            $data['status'] = 0;

            $user = $this->user->createUserWithInformation($data);
            auth()->login($user, true);
            $users = $this->user->adminGetAllUser();

            return view('dashboard', compact('users'))->with([
                'success' => 'User registered successfully!'
            ]);
        }catch(Exception $exception){
            return redirect()->back()->with([
                'error' => $exception->getMessage() ?: 'Unable to register user!'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return View|Factory|Application
     * @throws ModelCreateException
     */
    public function login(Request $request): View|Factory|Application
    {
        $user = $this->auth->login(... $request->only(['email', 'password']));
        auth()->login($user);

        $users = $this->user->adminGetAllUser();


        return view('dashboard', compact('users'));
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
        $user = Auth::user();
        $reference = $this->user->findWithEmail($user->information->reference);

        return view('user.profile', compact(['user', 'reference']));
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


}

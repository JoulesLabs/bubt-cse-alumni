<?php

namespace App\Services;

use App\Exceptions\ModelCreateException;
use App\Models\Information;
use App\Models\MemberRequest;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService extends Service
{
    /**
     * @param $id
     * @return User
     */
    public function getProfileData($id): Model
    {
        return User::with('tags', 'information.company')->find($id);
    }

    /**
     * @param $email
     * @return User
     * @throws ModelCreateException
     */
    public function findWithEmail($email): User
    {
        $user = User::where('email', $email)
            ->first();

        if (blank($user)) {
            throw new ModelnotFoundException();
        }

        return $user;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create(Arr::only($data, [
            'name',
            'email',
            'password',
            'mobile',
            'status'
            ]));
    }

    /**
     * @return mixed
     */
    public function getAllUsers(): mixed
    {
        return User::where('admin', 0)->orderBy('status')->paginate(20);
    }

    /**
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function createUserWithInformation(Request $request): User
    {
        $data = $request->except('reference_by', 'reference', '_token');

        try {
            DB::beginTransaction();

            $user = $this->create($data);

            $user->information()->create(Arr::only($data,[
                'intake',
                'shift',
            ]));

            DB::commit();

            return $user;
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }
    }

    /**
     * @param Request $request
     * @return MemberRequest
     */
    public function createMemberJoiningRequest(Request $request): MemberRequest
    {
        $reference = User::where($request->input('reference_by'), $request->input('reference'))->first();
        if (!$reference) {
            throw new \Exception("Reference not found");
        }

        $user = Auth::user();
        $data = $request->except('_token');
        $data['referer_id'] = $reference->id;

        return MemberRequest::query()->create($data);
    }

    public function checkAdmin()
    {
        return Auth::user()->admin;
    }

    public function adminGetAllUser()
    {
        if($this->checkAdmin())
        {
            return $this->getAllUsers();
        }

        return null;
    }

    /**
     * @param User $user
     * @param $data
     * @return bool
     */
    public function updateUser(User $user, $data): bool
    {
        return $user->update(Arr::only($data,[
            'name',
            'email',
            'mobile',
        ]));
    }

    /**
     * @param User $user
     * @param $data
     * @return int
     */
    public function updateInformation(User $user, $data): int
    {
        return $user->information()->update(Arr::only($data,[
            'intake',
            'shift',
            'passing_year',
            'university_id',
            'current_job_designation',
            'current_company',
            'lives',
            'facebook',
            'linkedin',
            'github',
        ]));
    }

}

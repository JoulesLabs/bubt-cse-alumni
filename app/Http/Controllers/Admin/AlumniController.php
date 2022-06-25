<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MemberRequestStatus;
use App\Enums\MsgType;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\MemberRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $alumni = \App\Models\User::with('information')->paginate();
        return view('admin.alumni.index', compact('alumni'));

    }

    public function create(Request $request)
    {
        return view('admin.alumni.create');
    }

    public function changeStatus(Request $request, $id)
    {
        $data = $this->validate($request, [
            'status' => 'required'
        ]);

        $alumni = \App\Models\User::find($id);

        if (!$alumni) {
            return redirect()->back()->with(msg('Alumni not found', MsgType::error));
        }

        $status = UserStatus::from($data['status']);

        $alumni->status = $status->value;
        $alumni->save();
        return redirect()->back()->with(msg('Alumni status changed'));
    }

    public function requests(Request $request)
    {
        $members = \App\Models\MemberRequest::with('referer')
            ->where('status', '!=', MemberRequestStatus::approved->value)
            ->paginate();

        return view('admin.alumni.requests', compact('members'));
    }

    public function requestsStatusChange(Request $request, $id)
    {
        $data = $this->validate($request, [
            'status' => 'required'
        ]);

        $member = \App\Models\MemberRequest::find($id);

        if (!$member) {
            return redirect()->back()->with(msg('Request not found', MsgType::error));
        }

        $status = MemberRequestStatus::from($data['status']);

        if ($status == MemberRequestStatus::approved) {
            $this->createUserFromRequests($member);
        }

        $member->status = MemberRequestStatus::approved->value;
        $member->save();

        return redirect()->back()->with(msg('Member Request status changed'));
    }

    protected function createUserFromRequests(MemberRequest $member): User
    {
        $user = new \App\Models\User();

        $user->setRawAttributes([
            'name' => $member->name,
            'email' => $member->email,
            'password' => $member->password,
            'mobile' => $member->mobile,
            'verified_at' => Carbon::now(),
            'status' => UserStatus::approved->value,
        ]);

        $user->save();

        $user->information()->create([
            'user_id' => $user->id,
            'intake' => $member->intake,
            'shift' => $member->shift,
            'referer_id' => $member->referer_id,
        ]);

        return $user;
    }
}

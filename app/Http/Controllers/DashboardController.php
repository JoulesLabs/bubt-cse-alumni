<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct(
        protected UserService $user,
    )
    {}


    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = $this->user->adminGetAllUser();

        return view('dashboard', compact('users'));
    }
}

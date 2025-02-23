<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    protected $userService;

    public function __construct(UserRepository $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->all();
        return view('dashboard.index', compact('users'));
    }
}

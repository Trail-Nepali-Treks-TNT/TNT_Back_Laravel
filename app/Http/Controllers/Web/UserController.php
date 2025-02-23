<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showuserprofile()
    {
        return view('user.userprofile');
    }

    public function Adduser()
    {
        return view('user.Adduser');
    }
}

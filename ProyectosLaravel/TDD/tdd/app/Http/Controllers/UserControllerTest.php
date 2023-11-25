<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserControllerTest extends Controller
{
    public function index(){
        $users = User::get();

        return view('users.index',compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user ){
        return view ('users.show',[
            'posts'=>$user->posts()->latest()->paginate()
    ]);
    }
}

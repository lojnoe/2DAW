<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view ('posts.index');
    }
    public function store(){

        // guardar
    }
    public function destroy(){

        // eliminar
    }

}

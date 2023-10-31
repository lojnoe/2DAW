<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view ('posts.index');
    }
    public function store(Request $request){

        $request -> validate(['body' => 'required']);
        return $request-> all();
    }
    public function destroy(){

        // eliminar
    }

}

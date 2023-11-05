<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        return view ('posts.index',[
                'posts'=>Post::latest()->paginate()
        ]);
    }
    public function store(Request $request){
        // dd(['body' => $request —>body]) ;
        $request -> validate(['body' => 'required']);
        $request-> user()->posts()->create($request->only('body'));
        
        return back()->with('status','Publicacion guardada exitosamente');
    }
    public function destroy(Request $request, Post $post){
        // dd($request->user()->id);
        /* Forma basica 
        if($request->user()->id !== $post-> user_id){
            abort(403);
        }*/
        /* Forma centralizada 
        $this->authorize('destroy-post',$post);
        $post -> delete();
        */
        // Forma buena 
        $this->authorize('delete',$post);
        $post -> delete();
        return back();
    }

}

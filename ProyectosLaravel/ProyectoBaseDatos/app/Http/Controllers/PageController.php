<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    
    public function home(){

        $title = 'Preguntas y respuestas';
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi illum harum placeat ipsum sunt vitae nostrum, soluta consequatur eius earum quaerat fuga, praesentium, cupiditate doloribus sed pariatur obcaecati cumque mollitia!';

        $threads = Thread::orderBy('id', 'DESC')
            ->with('category' ,'tags', 'user')
            ->withCount('comments')
            ->paginate();

        return view('list', compact('title','description','threads'));
    }

    public function category(Category $category){

        $title = "Categoría: $category->name";
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi illum harum placeat ipsum sunt vitae nostrum, soluta consequatur eius earum quaerat fuga, praesentium, cupiditate doloribus sed pariatur obcaecati cumque mollitia!';

        $threads = $category
            ->threads()
            ->orderBy('id', 'DESC')
            ->with('category' ,'tags', 'user')
            ->withCount('comments')
            ->paginate();
        return view('list', compact('title','description','category', 'threads'));
    }

    public function tag(Tag $tag){

        $title = "Etiqueta: $tag->name";
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi illum harum placeat ipsum sunt vitae nostrum, soluta consequatur eius earum quaerat fuga, praesentium, cupiditate doloribus sed pariatur obcaecati cumque mollitia!';

        $threads = $tag
        ->threads()
        ->orderBy('id', 'DESC')
        ->with('category' ,'tags', 'user')
        ->withCount('comments')
        ->paginate();
        return view('list', compact('title','description','tag', 'threads'));
    }

    public function thread(Thread $thread){

        $title = $thread->title;
        $description = 'Categoria ' . $thread->category->name;

        $comments = $thread
        ->comments()
        ->orderBy('id', 'DESC')
        ->with('user')
        ->get();
        return view('thread', compact('title','description','thread', 'comments'));
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return 'home';
    }
    public function category($category){
        return 'category '. $category;
    }
    public function tag($tag){
        return 'tag '. $tag;
    }
    public function thread($thread){
        return 'thread '. $thread;
    }
}

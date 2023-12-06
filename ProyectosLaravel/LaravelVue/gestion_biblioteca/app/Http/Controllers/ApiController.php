<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ApiController extends Controller
{
    public function index(){
        $libros = Books::with('author')->get();
        return response()->json($libros);
    }

    public function store(Request $request){
        try{

            $request->validate([
                'title' => 'required|string',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer',

            ]);

            $libro = new Books();
            $libro->title = $request->input('title');
            $libro->author_id = $request->input('author_id ');
            $libro->published_year = $request->input('published_year');
            $libro -> save();
            return response()->json($libro,201);

        }catch(\Exception $e){
            return response()->json(['error' => 'Error'], 500);
        }

    }


    public function destroy($id){
        $book = Books::find($id);

        if(!$book){
            return response()->json(['message' => 'El libro no esta '],404);
        }else{
            $book->delete();
            return response()->json(['message' => 'El libro se borro '],200);
        }
    }
}


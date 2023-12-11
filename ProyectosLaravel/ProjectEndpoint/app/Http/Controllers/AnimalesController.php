<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalesController extends Controller
{
    public function getAnimales(){
        $animales = [ "Rey", "Leon","Gacela","Hiena","Simba"];

        return response()->json(['mensaje' => ' Esto son los animales' , 'datos' => $animales]);
    }
}

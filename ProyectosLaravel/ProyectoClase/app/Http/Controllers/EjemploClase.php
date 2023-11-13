<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;

class EjemploClase extends Controller
{
    public function obtener() {
       return Alumnos::obtenerTodos();
    }
}

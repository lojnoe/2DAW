<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    
    public function test_form()
    {
        //ruta del formulario con los metodos del ProductController products.create para crear y products.store guardar los datos
        $this
        ->get(route('products.create'))
        ->assertStatus(200)
        ->assertSee(route('products.store'));

        
    }

    public function test_store()
    {
        //Simulación datos del formulario
        $data = ['name' => 'Producto de prueba'];
       
        //almacenar los datos y reidirigir al index de productos
        $this
            ->post(route('products.store'), $data)
            ->assertRedirect(route('products.index'));
            
        //comprobar que se han introducido los datos correctamente en la base de datos
        $this->assertDatabaseHas('products', $data);

        
    }

    public function test_validate()
    {
        //Cuando el valor name de la tabla este vacio
        $data = ['name' => ''];
       
        //almacenar los datos y reidirigir al index de productos
        $this
            ->post(route('products.store'), $data)
            ->assertSessionHasErrors('name')
            ->assertStatus(302);
            
        
    }
}

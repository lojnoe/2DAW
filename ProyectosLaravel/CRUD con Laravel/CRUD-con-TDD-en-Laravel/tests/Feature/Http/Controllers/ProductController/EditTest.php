<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class EditTest extends TestCase
{
    use RefreshDatabase;

    public function test_form()
    {
        $product = Product::factory()->create();
        
        $this
            ->get(route('products.edit', $product))
            ->assertStatus(200)
            ->assertSee($product->name)
            ->assertSee(route('products.update', $product));

        
    }

    public function test_update()
    {
        $product = Product::factory()->create();
        //Simulación datos del formulario
        $data = ['name' => 'Nuevo nombre'];
       
        //almacenar los datos y reidirigir al index de productos
        $this
            ->put(route('products.update', $product), $data)
            ->assertRedirect(route('products.index'));
            
        //comprobar que se han introducido los datos correctamente en la base de datos
        $this->assertDatabaseHas('products', $data);

        
    }

    public function test_validate()
    {
        $product = Product::factory()->create();
        //Cuando el valor name de la tabla este vacio
        $data = ['name' => null];
       
        //almacenar los datos y reidirigir al index de productos
        $this
            ->put(route('products.update', $product), $data)
            ->assertSessionHasErrors('name')
            ->assertStatus(302);
            
        
    }
}
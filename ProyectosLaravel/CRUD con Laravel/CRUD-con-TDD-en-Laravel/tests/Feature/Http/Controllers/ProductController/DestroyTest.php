<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_destroy()
    {
        $product = Product::factory()->create();

        $this
            //elimina el producto 
            ->delete(route('products.destroy', $product))
            //redirige al index despues de borrar el producto
            ->assertRedirect(route('products.index'));
        //comprueba que el producto se ha eliminado de la base de datos
        $this->assertDatabaseMissing('products', $product->toArray());
    }
}

<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
class IndexTest extends TestCase
{
    use RefreshDatabase;
    public function test_list()
    {
        $product = Product::factory()->create();

        $this->get(route('products.index'))
        ->assertStatus(200)
        ->assertSee($product->name)
        ->assertSee(route('products.create'))
        ->assertSee(route('products.show', $product))
        ->assertSee(route('products.edit', $product))
        ->assertSee(route('products.destroy', $product))
        ;

        
    }

    public function test_empty()
    {
        $this
        ->get(route('products.index'))
        ->assertStatus(200)
        ->assertSee('No hay productos registrados');

    }

    public function test_paginate()
    {
            $first = Product::factory()->create();
            $products = Product::factory()->count(9)->create();
            $last= Product::factory()->create();

        $this
        ->get(route('products.index'))
        ->assertStatus(200)
        ->assertSee($last->name);

        $this
        ->get(route('products.index', ['page' => 2]))
        ->assertStatus(200)
        ->assertSee($first->name)
        ->assertSee(route('products.index', ['page' => 1]));

    }

}

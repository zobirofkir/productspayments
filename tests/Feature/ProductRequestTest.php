<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductRequestTest extends TestCase
{
    /**
     * Test Create Product.
     */
    public function testCreateProduct()
    {
        $users = User::factory()->create();
        $products = Product::factory()->create([
            "user_id" => $users->id
        ]);
        $response = $this->post("/api/products", $products->toArray());
        $response->assertStatus(201);
    }

    /**
     * Test Get Products.
     */
    public function testGetProducts()
    {
        $users = User::factory()->create();
        $products = Product::factory()->create([
            "user_id" => $users->id
        ]);
        $response = $this->get("/api/products");
        $response->assertStatus(200);
    }

    /**
     * Test Show Product.
     */
    public function testShowProduct()
    {
        $users = User::factory()->create();
        $products = Product::factory()->create([
            "user_id" => $users->id
        ]);
        $response = $this->get("/api/products/$products->id");
        $response->assertStatus(200);
    }

    /**
     * Test Update Product.
     */
    public function testUpdateProduct()
    {
        $users = User::factory()->create();
        $products = Product::factory()->create([
            "user_id" => $users->id
        ]);

        $productUpdate = [
            "user_id" => $users->id,
            "title" => "Product 1",
            "description" => "Product 1 description",
            "price" => 100
        ];

        $response = $this->put("/api/products/$products->id", $productUpdate);

        $response->assertStatus(200);
    }

    /**
     * Test Delete Product.
     */
    public function testDeleteProduct()
    {
        $users = User::factory()->create();
        $products = Product::factory()->create([
            "user_id" => $users->id
        ]);
        $response = $this->delete("/api/products/$products->id");
        $response->assertStatus(200);
    }
}

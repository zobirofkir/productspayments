<?php
namespace App\Services\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Constractors\ProductConstructor;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductService implements ProductConstructor
{
    public function index() : AnonymousResourceCollection 
    {
        return ProductResource::collection(
            Product::all()
        );
    }

    public function show(Product $product) : ProductResource
    {
        return ProductResource::make($product);
    }

    public function store(ProductRequest $request) : ProductResource
    {
        return ProductResource::make(
            Product::create($request->all())
        );
    }

    public function update(ProductRequest $request, Product $product) : ProductResource
    {
        $product->update($request->all());

        return ProductResource::make(
            $product->refresh()
        );
    }

    public function destroy(Product $product) : bool
    {
        return $product->delete();
    }
}
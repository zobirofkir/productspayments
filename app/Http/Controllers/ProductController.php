<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Facades\ProductFacade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        return ProductFacade::index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) : ProductResource
    {
        return ProductFacade::store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : ProductResource
    {
        return ProductFacade::show($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product) : ProductResource
    {
        return ProductFacade::update($request, $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : bool
    {
        return ProductFacade::destroy($product);
    }
}

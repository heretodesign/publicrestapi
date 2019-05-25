<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ( (int)$_REQUEST['weight'] < 1000) {
            return response()->json('error weight should be at least 1000');
        } else {
            $product = new Product();
            $product->seller_name = request('seller_name');
            $product->weight = request('weight');
            $product->country_of_origin = request('country_of_origin');
            $product->harvesting_date = request('harvesting_date');
            $product->cultivar = request('cultivar');
            $product->auction = request('auction');
            $product->save();


            return json_encode(array(
                'status' => 200, // success or not?
                'message' => 'succesfully added',
                'products' => $product
            ));
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
             'seller_name' => 'required|string',
             'weight' => 'required|integer',
             'country_of_origin' => 'required|string',
             'harvesting_date' => 'required|string',
             'cultivar' => 'required|string',
             'auction' => 'required|boolean',
        ]);

        $product->update($request->all());
        return response()->json('Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response('Deleted a Product item from your Produce LIst', 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Buyer;


class BuyersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer = Buyer::all();

        return $this->sendResponse($buyer->toArray(), 'buyer retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Buyer::make($input, [
            'name' => 'required|min:3',
            'bid_price' => 'required|numeric'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $buyer = Buyer::create($input);

        return $this->sendResponse($buyer->toArray(), 'buyer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer, $id)
    {
        $buyer = Buyer::find($id);


        if (is_null($buyer)) {
            return $this->sendError('buyer not found.');
        }


        return $this->sendResponse($buyer->toArray(), 'Buyer retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $input = $request->all();

        $data = Validator::make($input, [
            'name' => 'required',
            'bid_price' => 'required'
        ]);

        if($data->fails()){
            return $this->sendError('Validation Error.', $data->errors());       
        }

        $buyer->name = $input['name'];
        $buyer->bid_price = $input['bid_price'];
        $buyer->save();

        return $this->sendResponse($buyer->toArray(), 'Buyer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();

        return $this->sendResponse($buyer->toArray(), 'Buyer deleted successfully.');
    }
}

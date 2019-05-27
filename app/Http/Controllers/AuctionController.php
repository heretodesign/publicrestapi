<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Auction;
use Illuminate\Http\Request;

class AuctionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auction = Auction::all();

        return $this->sendResponse($auction->toArray(), 'List of Auction retrieved successfully.');
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

        $validator = Auction::make($input, [
            'price' => 'required|numeric',
            'start_date' => 'required',
            'duration' => 'required|numeric',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $auction = Auction::create($input);

        return $this->sendResponse($auction->toArray(), 'Auction created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $auction = Product::find($auction);


        if (is_null($auction)) {
            return $this->sendError('Product not found.');
        }


        return $this->sendResponse($auction->toArray(), 'Auction retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {

        $input = $request->all();

        $data = Auction::make($input, [
            'price' => 'required|numeric',
            'start_date' => 'required',
            'duration' => 'required|numeric',
        ]);

        if($data->fails()){
            return $this->sendError('Validation Error.', $data->errors());       
        }

        $auction = Auction::create($input);

        return $this->sendResponse($auction->toArray(), 'Auction created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();

        return $this->sendResponse($auction->toArray(), 'Auction deleted successfully.');
    }
}

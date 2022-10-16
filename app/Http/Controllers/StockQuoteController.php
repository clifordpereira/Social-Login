<?php

namespace App\Http\Controllers;

use App\Models\StockQuote;
use Illuminate\Http\Request;

class StockQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockQuotes = StockQuote::all();
        return view('/stock-quotes', compact('stockQuotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return StockQuote::create($request->all());
    }
}
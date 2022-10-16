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
        return StockQuote::where('user_id', auth()->id())->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $stockQuotes = StockQuote::where('user_id', auth()->id())->get();
        return view('/dashboard', compact('stockQuotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return StockQuote::create($request->all() + ['user_id'=>auth()->id()]);
        // if symbol should not be duplicated, updateOrCreate() method can be used
    }
}

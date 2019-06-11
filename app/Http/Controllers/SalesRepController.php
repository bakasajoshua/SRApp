<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\User;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id=auth()->user()->id;
        $sales=Sales::where('user_id', $user_id)->get();
        return view('salesrep.salesrep')->with('sales', $sales);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesrep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id=auth()->user()->id;
        $this->validate($request,[
            'user_id'=>'required',
            'product'=>'required',
            'price'=>'required',
        ]);
        $sale = new Sales;
        $sale->user_id= $request->input('user_id');
        $sale->product= $request->input('product');
        $sale->price= $request->input('price');
        $sale->save();

        return redirect('/sales3')->with('success', 'Sales Made');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

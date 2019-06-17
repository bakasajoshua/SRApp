<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user=auth()->user();
        foreach($user->children as $child){
            $child->children;
        }
        $sales=Sales::where('user_id', $user->id)->get();
        // $sales=Sales::all();
        return view('manager.manager')->with('sales', $sales);

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
            'product'=>'required',
            'price'=>'required',
        ]);
        $sale = new Sales;
        $sale->user_id= auth()->user()->id;
        $sale->product= $request->input('product');
        $sale->price= $request->input('price');
        $sale->save();

        return redirect('/sales1')->with('success', 'Sales Made');

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

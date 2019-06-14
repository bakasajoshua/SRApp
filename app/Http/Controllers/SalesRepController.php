<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\User;
use App\Commission;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user=auth()->user();
        // dd($user->parent->parent);
        $sales=Sales::where('user_id', $user->id)->get();
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
            // 'user_id'=>'required',
            'product'=>'required',
            'price'=>'required',
        ]);
        $sale = new Sales;
        $sale->user_id= auth()->user()->id;
        // $request->input('user_id');
        $sale->product= $request->input('product');
        $sale->price= $request->input('price');
        $sale->save();
        
        
        // Get supervisor and/or manager
        // $users=User::all();
        $user=auth()->user();
        // $user_id=auth()->user()->id;
        // $usertype=User::find($user_id);
        // $user->parent;
        // $user->parent->parent;

        // Calculate commissions
        $commission = new Commission;
        $commission->user_id= $user->id;
        $commission->sales_id= $sale->id;
        $commission->commission=(10/100)*($request->input('price'));
        $commission->save();
       
        if ($user->user_type_id==3) {
            $commission2 = new Commission;
            $commission2->user_id= $user->parent->id;
            $commission2->sales_id= $sale->id;
            $commission2->commission=(5/100)*($request->input('price'));
            $commission2->save();


            $commission1 = new Commission;
            $commission1->user_id= $user->parent->parent->id;
            $commission1->sales_id= $sale->id;
            $commission1->commission=(2/100)*($request->input('price'));
            $commission1->save();
        } 
        elseif ($user->user_type_id==2) {
            $commission3 = new Commission;
            $commission3->user_id= $user->parent->id;
            $commission3->sales_id= $sale->id;
            $commission3->commission=(5/100)*($request->input('price'));
            $commission3->save();
            
        }
        // Save sales
        
        // Save the commissoins
        
       
        
        
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

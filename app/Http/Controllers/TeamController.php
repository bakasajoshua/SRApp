<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id=auth()->user()->id;
        $user_types=UserType::all();
        $teams=Team::all();
        $users=User::whereNull('user_type_id')->get();
        return view('team.index')->with('users', $users)->with('user_types', $user_types)->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $this->validate($request,[
            'name'=>'required',
        ]);
        // dd($request->all());
        $team = new Team;
        $team->name= $request->input('name');
        $team->save();
        
        return redirect('team')->with('success', 'Team successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $user=auth()->user();
        // $parents=$user->children->name;

        
        return view('team.show', compact('user'))
        // ->with('user', $user)->with('users', $users)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users=User::find($id);
        return view('team.edit')->with('users', $users);
    }

    // public function add(){
    //     $users=User::whereNull('user_type_id')->get();
    //     return view('team.edit')->with('users', $users);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_type_id'=>'required',
        ]);
        // dd($request->all());
        $user = auth()->user();
        $users = User::find($id);
        $users->user_type_id= $request->input('user_type_id');
        $users->team_id=$user->team_id;
        $users->parent_id=$user->id;
        $users->save();
        
        return redirect('team')->with('success', 'Update successfully created');
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

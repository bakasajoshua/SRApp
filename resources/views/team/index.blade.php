@extends('layouts.app')

@section('content')
    <h1>Select Supervisors</h1>
    @if (count($users)>0)
        @foreach ($users as $user)
            <div class="well">
            <a href="/team/{{$user->id}}/edit">{{$user->name}}</a>

            </div>
            
        @endforeach
        
    @else
    <p>There is no user to promote</p>
        
    @endif
    

@endsection
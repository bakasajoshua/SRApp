@extends('layouts.app')

@section('content')
    
    @foreach ($user->children as $child)
        <div>
            <label>Email: {{ $child->email }}</label>
            <label>Name: {{ $child->name }}</label>
            @foreach ($child->children as $grand)
                <div>
                    <label>Email: {{ $grand->email }}</label>
                    <label>Name: {{ $grand->name }}</label>
                </div>
            @endforeach
        </div>
    @endforeach
    
@endsection
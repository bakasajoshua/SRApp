@extends('layouts.app')

@section('content')
    @foreach ($parents as $parent)
        <div>
            {{$parent->children}}
        </div>
        
    @endforeach
    {{-- @foreach ($user->children as $child->name){
        <div>
            {{$child->children}}
        </div>
        
    } --}}
    
        
    @endforeach
    
@endsection
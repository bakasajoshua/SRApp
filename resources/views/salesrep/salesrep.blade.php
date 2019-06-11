@extends('layouts.app')

@section('content')
    <h1>Welcome </h1>
    <p>Here are your sales for this week:</p>
    @if (count($sales)>0)
        @foreach ($sales as $sale)
            <div class="well">
                {{$sale->product}}
                {{$sale->price}}
                {{$sale->created_at}}

            </div>
            
        @endforeach
        
    @else
    <p>There are no sales today</p>
        
    @endif
    
@endsection
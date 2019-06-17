@extends('layouts.app')

@section('content')
    <h1>Post Sales</h1>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ url('sales1/store') }}">
                @csrf
                {{-- <div class="form-group row"> --}}
                    <div class="form-group">
                        Product:<br>
                        <input type="textarea" name="product"><br><br>
                    </div>
                    <div class="form-group">
                        Price:<br>
                        <input type="number" name="price"><br><br>
                        <input type="submit" value="Submit">
                    </div>
            </form>
        </div>
    </div>

@endsection
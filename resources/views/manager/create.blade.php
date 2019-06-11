@extends('layouts.app')

@section('content')
    <h1>Post Sales</h1>
    <form method="POST" action="{{ url('sales') }}">
            @csrf
        <div class="form-group row">
            <form>
                <div class="form-group">
                    User Id:<br>
                    <input type="text" name="user_id"><br><br>
                </div>
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

@endsection
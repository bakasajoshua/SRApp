@extends('layouts.app')

@section('content')
   <h1>Create New Team</h1>
   <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ url('team') }}" class="center">
            @csrf()
                    {{-- <div class="form-group row"> --}}                
                    Team Name:<br>
                    <input type="text" name="name"><br><br>
                    <input type="submit" value="Submit">
                        {{-- </div>                    --}}
            </form>
        </div>   
    </div>

@endsection
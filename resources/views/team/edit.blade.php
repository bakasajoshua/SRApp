@extends('layouts.app')

@section('content')
   <h1>Add Supervisor to your team</h1>
   <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="{{ url('team/'.$users->id)}}">
                    @csrf
                <div class="form-group">
                    User Type:<br>
                    <select name="user_type_id">
                            <option value="">Select</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Sales Representative</option>
                    </select><br><br>
                    <input type="submit" value="Submit">
                </div>  
                @method('PUT')            
        </form>
        </div>
    </div>

@endsection
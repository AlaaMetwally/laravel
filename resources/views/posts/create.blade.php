@extends('layouts.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
<div class="table-wrapper"> 
<form method="post" action="/posts">
{{csrf_field()}}
@if(isset($msg))
<h3 style="color:red">{{$msg}}</h3>
@endif
Title :- <input type="text" name="title">
<br><br>
Description :- 
<textarea name="description"></textarea>
<br>
<br>
Post Creator
<select class="form-control" name="user_id">
@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>
</div>
@endsection




    

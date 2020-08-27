@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create New Role</h2>
<form method="post" action="{{url('roles')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="role_name" class="control-label">Roles</label>
    <input type="text" class="form-control" id="role_name" name="role_name" value="{{old('role_name')}}">
    @if($errors->has('role_name'))
        <small>{{ $errors->first('role_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection
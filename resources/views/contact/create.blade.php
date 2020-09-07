@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
    @endif

<h2>Contact Us</h2>
<form method="post" action="{{url('contact')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="name" class="control-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    @if($errors->has('name'))
        <small>{{ $errors->first('name') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="email" class="control-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
    @if($errors->has('email'))
        <small>{{ $errors->first('email') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="message" class="control-label">Message</label> <br>
    <textarea name="message" id="message" cols="100" rows="10">{{old('message')}}</textarea>
    @if($errors->has('message'))
        <small>{{ $errors->first('message') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Send Message</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection
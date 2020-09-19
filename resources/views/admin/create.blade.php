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

<h2>Send Email to Users</h2>
<form method="post" action="{{url('admin')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="name" value="">
<div class="form-group">
    <label for="email" class="control-label">Email</label>
    {!! Form::select('email',$users, null,['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <small>{{ $errors->first('email') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="subject" class="control-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}">
    @if($errors->has('subject'))
        <small>{{ $errors->first('subject') }}</small>
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

@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Edit Rating</h2>
{!! Form::model($ratings,['method'=>'PATCH','route' => ['ratings.update',$ratings->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="score" class="control-label">Roles</label>
    {{ Form::text('score',null,array('class'=>'form-control','id'=>'score')) }}
</div>

<div class="form-group">
    <label for="comment" class="control-label">Comment</label>
    {{ Form::text('comment',null,array('class'=>'form-control','id'=>'comment')) }}
</div>

    <input type="hidden"   name="id" value="{{$ratings->id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection
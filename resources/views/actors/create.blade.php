@extends('layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Create New Actor</h2>
            <form method="post" action="{{url('actors')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="actor_image" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname')}}">
                    @if($errors->has('fname'))
                    <small>{{ $errors->first('fname') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="lname" class="control-label">Last Name</label>
                    <input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}">
                    @if($errors->has('lname'))
                    <small>{{ $errors->first('lname') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="notes" class="control-label">Notes</label>
                    <input type="text" class="form-control " id="notes" name="notes" value="{{old('notes')}}">
                    @if($errors->has('notes'))
                    <small>{{ $errors->first('notes') }}</small>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
            </div>
        </div>
    </form>
    @endsection

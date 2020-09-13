@extends('layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Edit Actor</h2>
            {!! Form::model($actors,['method'=>'PATCH','route' => ['actors.update',$actors->actor_id]]) !!}
            {{-- csrf_field() --}}
            {{-- method_field('PATCH') --}}

            <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="actor_image" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
            </div>

            <div class="form-group">
                <label for="fname" class="control-label">First Name</label>
                {{ Form::text('fname',null,array('class'=>'form-control','actor_id'=>'fname')) }}
            </div>

            <div class="form-group">
                <label for="lname" class="control-label">Last Name</label>
                {{ Form::text('lname',null,array('class'=>'form-control','actor_id'=>'lname')) }}
            </div>

            <div class="form-group">
                <label for="notes" class="control-label">Notes</label>
                {{ Form::text('notes',null,array('class'=>'form-control','actor_id'=>'notes')) }}
            </div>

            <input type="hidden"   name="id" value="{{$actors->actor_id}}">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>
{!! Form::close() !!}
@endsection

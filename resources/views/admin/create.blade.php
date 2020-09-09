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

<h2>Send Email</h2>
<form method="post" action="{{url('admin')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="name" class="control-label">Name</label>
    {{-- {!! Form::select('name',$users, null,['class' => 'form-control']) !!} --}}
    <select class="form-control input-sm" name="name">
        @foreach ($users as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
    </select>
    @if($errors->has('name'))
        <small>{{ $errors->first('name') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="email" class="control-label">Email</label>
    <select class="form-control input-sm" name="email"></select>
    {{-- <img id="loader" src="{{url('/images/ajax-loader.gif')}}" alt="loader"> --}}
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

<style>
    #loader {
        position: absolute;
        right: 18px;
        top: 30px;
        width: 20px;
    }
</style>
<script>
    $(function () {
        var loader = $('#loader'),
            name = $('select[name="name"]'),
            email = $('select[name="email"]');

        loader.hide();
        email.attr('disabled','disabled')

        email.change(function(){
            var id = $(this).val();
            if(!id){
                email.attr('disabled','disabled')
            }
        })

        name.change(function() {
            var id= $(this).val();
            if(id){
                loader.show();
                email.attr('disabled','disabled')

                $.get('{{url('/dropdown-data?id=')}}'+id)
                    .success(function(data){
                        var s='<option value="">---select--</option>';
                        data.forEach(function(row){
                            s +='<option value="'+row.id+'">'+row.name+'</option>'
                        })
                        email.removeAttr('disabled')
                        email.html(s);
                        loader.hide();
                    })
            }

        })
    })
</script>

@endsection
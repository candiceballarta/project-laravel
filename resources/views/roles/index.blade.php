@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('roles.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>ADD</strong></span>
    </a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
    @endif
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Role ID</th>
            <th>Role Name</th>
            <th>Edit</>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
        <td>{{$role->id}}</td>
            <td><a href="{{route('roles.show',$role->id)}}">{{$role->role_name}}</a></td>
            <td>{{$role->lname}}</td>
            <td align="center"><a href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
            <td align="center"><a href="{{ route('roles.destroy',$role->id) }}"  ><i class="fa fa-trash-o" style="font-size:24px; color:red" ></a></i></td>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>
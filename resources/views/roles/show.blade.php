@extends('layouts.app')
@section('content')
<h1>{{$roles->role_name}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Role ID</th>
            <th>Role Name</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$roles->id}}</td>
        <td>{{$roles->role_name}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>
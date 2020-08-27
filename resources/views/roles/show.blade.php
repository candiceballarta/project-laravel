<!-- resources/views/show.blade.php -->
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
@extends('layouts.base')
</head>
<body>
@section('body')
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
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
<h1>{{$actors->fname}}</h1>
<h1>{{$actors->lname}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Actor ID</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$actors->id}}</td>
        <td>{{$actors->notes}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>
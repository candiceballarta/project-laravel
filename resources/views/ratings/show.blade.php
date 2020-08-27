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
<h1>{{$ratings->score}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Rating ID</th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$ratings->rating_id}}</td>
        <td>{{$ratings->score}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>
@extends('layouts.app')
@section('content')
<h1>{{$actors->fname}}</h1>
<h1>{{$actors->lname}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Actor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$actors->id}}</td>
        <td>{{$actors->fname}}</td>
        <td>{{$actors->lname}}</td>
        <td>{{$actors->notes}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('ratings.create')}}" class="btn btn-primary a-btn-slide-text">
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
            <th>User ID</th>
            <th>Rating ID</th>
            <th>Score</th>
            <th>Comment</th>
            <th>Edit</>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $rating)
        <tr>
        <td>{{$rating->id}}</td>
            <td>{{$rating->score}}</td>
            <td>{{$rating->comment}}</td>
            <td align="center"><a href="{{ route('ratings.edit',$rating->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
            <td align="center">{!! Form::open(array('route' => array('ratings.destroy',$rating->id),'method'=>'DELETE')) !!}
            <button ><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>

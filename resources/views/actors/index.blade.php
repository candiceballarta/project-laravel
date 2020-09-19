@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('actors.create')}}" class="btn btn-primary a-btn-slide-text">
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
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th>Actor ID</th>
                    <th>Name</th>
                    <th>Notes</th>
                    <th>Edit</>
                        <th>Delete</th>
                        <th>Restore</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actors as $actor)
                    <tr>
                        <td>{{$actor->actor_id}}</td>
                        <td><a href="{{route('actors.show',$actor->actor_id)}}">{{$actor->fname}} {{$actor->lname}}</a></td>
                        <td>{{$actor->notes}}</td>

                        <td>{!! Form::open(array('route' => array('actors.edit', $actor->actor_id),'method' => 'GET')) !!}
                            <button><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px; color:yellow" ></i></button></td>
                            {!! Form::close() !!}
                        <td>{!! Form::open(array('route' => array('actors.destroy', $actor->actor_id),'method'=>'DELETE')) !!}
                            <button ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px; color:red" ></i></button></td>
                            {!! Form::close() !!}
                        <td>{!! Form::open(array('route' => array('actors.restore', $actor->actor_id), 'method'=>'GET')) !!}
                            <button><i class="fa fa-undo" aria-hidden="true" style="font-size:24px; color:green" ></i></button></td>
                            </tr>
                        {!! Form::close() !!}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endsection
            </body>
            </html>

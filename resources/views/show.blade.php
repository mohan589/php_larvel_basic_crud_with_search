@extends('layouts.app')

@section('content')
<div class="container col-md-4">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('CourseController@update', $id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Course Title:</label>
            <input type="text" class="form-control" name="title" value={{$course->title}} />
        </div>
        <div class="form-group">
            <label for="description">Course Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$course->description}}</textarea>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')


<div class="container">
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search">Search</span>
                </button>
            </span>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td width="160">Title</td>
              <td>Description</td>
            </tr>
        </thead>
        <tbody>
            @if(isset($details))
                @foreach($details as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                </tr>
                @endforeach
            @else
                @foreach($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->title}}</td>
                <td>{{$course->description}}</td>
                <td><a href="{{action('CourseController@edit',$course->id)}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{action('CourseController@show',$course->id)}}" class="btn btn-primary">Show</a></td>
                <td>
                    <form action="{{action('CourseController@destroy', $course->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
<div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard for Courses</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                       <a href="{{url('/create/course')}}" class="btn btn-success">Create Course</a>
                       <a href="{{url('/courses')}}" class="btn btn-default">All Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $course->name ?? 'Show Course' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Course</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.courses.index',$course->sclass_id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $course->name }}
                        </div>
                        <div class="form-group">
                            <strong>Sclass Id:</strong>
                            {{ $course->sclass->name }}
                        </div>
                        <div class="form-group">
                            <strong>Teacher Id:</strong>
                            {{ $course->teacher->fname.' '.$course->teacher->lname }}
                        </div>
                        <div class="form-group">
                            <strong>Subject Id:</strong>
                            {{ $course->subject->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

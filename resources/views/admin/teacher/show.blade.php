@extends('layouts.app')

@section('template_title')
    {{ $teacher->name ?? 'Show Teacher' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Teacher</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.teachers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Fname:</strong>
                            {{ $teacher->fname }}
                        </div>
                        <div class="form-group">
                            <strong>Lname:</strong>
                            {{ $teacher->lname }}
                        </div>
                        <div class="form-group">
                            <strong>Father:</strong>
                            {{ $teacher->father }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $teacher->user->email ?? ''}}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $teacher->address }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $teacher->note }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $teacher->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Mobile:</strong>
                            {{ $teacher->mobile }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

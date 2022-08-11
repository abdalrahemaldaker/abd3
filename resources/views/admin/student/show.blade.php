@extends('layouts.app')

@section('template_title')
    {{ $student->name() ?? 'Show Student' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.students.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Fname:</strong>
                            {{ $student->fname }}
                        </div>
                        <div class="form-group">
                            <strong>Lname:</strong>
                            {{ $student->lname }}
                        </div>
                        <div class="form-group">
                            <strong>Father:</strong>
                            {{ $student->father }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $student->user->email ?? '' }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $student->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Mobile:</strong>
                            {{ $student->mobile }}
                        </div>
                        <div class="form-group">
                            <strong>Birthdate:</strong>
                            {{ $student->birthdate }}
                        </div>
                        <div class="form-group">
                            <strong>note:</strong>
                            {{ $student->note }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

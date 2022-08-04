@extends('layouts.app')

@section('template_title')
    {{ $examResult->name ?? 'Show Exam Result' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Exam Result</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.exam-results.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Exam Id:</strong>
                            {{ $examResult->exam_id }}
                        </div>
                        <div class="form-group">
                            <strong>Student Id:</strong>
                            {{ $examResult->student_id }}
                        </div>
                        <div class="form-group">
                            <strong>Course Id:</strong>
                            {{ $examResult->course_id }}
                        </div>
                        <div class="form-group">
                            <strong>Mark:</strong>
                            {{ $examResult->mark }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

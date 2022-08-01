@extends('layouts.app')

@section('template_title')
    {{ $exam->name ?? 'Show Exam' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Exam</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('exams.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $exam->name }}
                        </div>
                        <div class="form-group">
                            <strong>Year Id:</strong>
                            {{ $exam->year_id }}
                        </div>
                        <div class="form-group">
                            <strong>Exam Type Id:</strong>
                            {{ $exam->exam_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $exam->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

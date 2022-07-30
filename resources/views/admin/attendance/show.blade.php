@extends('layouts.app')

@section('template_title')
    {{ $attendance->name ?? 'Show Attendance' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Attendance</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.attendances.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $attendance->date }}
                        </div>
                        <div class="form-group">
                            <strong>Student Id:</strong>
                            {{ $attendance->student_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $attendance->status }}
                        </div>
                        <div class="form-group">
                            <strong>Remark:</strong>
                            {{ $attendance->remark }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

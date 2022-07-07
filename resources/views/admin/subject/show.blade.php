@extends('layouts.app')

@section('template_title')
    {{ $subject->name ?? 'Show Subject' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Subject</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.subjects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $subject->name }}
                        </div>
                        <div class="form-group">
                            <strong>Stage Id:</strong>
                            {{ $subject->stage_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

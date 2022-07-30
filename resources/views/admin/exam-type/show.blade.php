@extends('layouts.app')

@section('template_title')
    {{ $examType->name ?? 'Show Exam Type' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Exam Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.exam-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $examType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Desc:</strong>
                            {{ $examType->desc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

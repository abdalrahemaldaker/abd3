@extends('layouts.app')

@section('template_title')
    {{ $sclass->name ?? 'Show Sclass' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sclass</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.sclasses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $sclass->year->name }}
                        </div>
                        <div class="form-group">
                            <strong>Stage:</strong>
                            {{ $sclass->stage->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

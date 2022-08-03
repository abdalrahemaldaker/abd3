@extends('layouts.app')

@section('template_title')
    Create Exam Result
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Exam Result</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.exam-results.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.exam-result.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

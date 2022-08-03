@extends('layouts.app')

@section('template_title')
    Update Exam Result
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Exam Result</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.exam-results.update', $examResult->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.exam-result.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

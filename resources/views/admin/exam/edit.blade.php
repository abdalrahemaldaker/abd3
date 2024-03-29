@extends('layouts.app')

@section('template_title')
    Update Exam
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Exam</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.exams.update', $exam->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.exam.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

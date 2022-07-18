@extends('layouts.app')

@section('template_title')
    Create Student
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Student</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.students.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @include('admin.student.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

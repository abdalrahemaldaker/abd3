@extends('layouts.app')
@section('title','Layout')
@section('content')
<a href="{{ route('admin.users.index') }}">Users</a>
<a href="{{ route('admin.years.index') }}">Years</a>
<a href="{{ route('admin.stages.index') }}">Stages</a>
<a href="{{ route('admin.subjects.index') }}">Subjects</a>
<a href="{{ route('admin.students.index') }}">Students</a>
<a href="{{ route('admin.teachers.index') }}">Teachers</a>
<a href="{{ route('admin.sclasses.index') }}">Classes</a>
<a href="{{ route('admin.attendances.index') }}">Attendance</a>
<a href="{{ route('admin.exam-types.index') }}">Exam Types</a>




@endsection

@extends('layouts.app')
@section('title','Layout')
@section('content')
<a href="{{ route('admin.users.index') }}">Users</a>
<a href="{{ route('admin.years.index') }}">years</a>
<a href="{{ route('admin.stages.index') }}">stages</a>
<a href="{{ route('admin.subjects.index') }}">subjects</a>




@endsection

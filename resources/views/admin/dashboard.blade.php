@extends('layouts.app')
@section('title','Layout')
@section('content')
<a href="{{ route('admin.users.index') }}">Users</a>
<a href="{{ route('admin.years.index') }}">years</a>




@endsection

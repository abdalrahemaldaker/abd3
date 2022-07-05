@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('partials.header')
    @include('sections.facilities')
    @include('sections.about')
    @include('sections.class')
    @include('sections.registration')
    @include('sections.team')
    @include('sections.Testimonial')
    @include('sections.blog')

@endsection

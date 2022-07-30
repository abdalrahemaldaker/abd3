@extends('layouts.app')

@section('template_title')
    Update Attendance
@endsection

@section('content')
    <section class="content container-fluid">

        @foreach ($sclass->students as $student)
        <div class="form-check form-check-inline">
            {{-- {{ Attendance::where('sclass_id')->where('date', )->get() }} --}}
            <input type="checkbox" class="form-check-input" name="{{$student->id}}" id="{{ $student->id }}"   >
            <label class="form-check-label" for="{{ $student->id }}">{{ $student->fname.' '.$student->lname }}</label>
          </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection

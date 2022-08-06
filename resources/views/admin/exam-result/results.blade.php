@extends('layouts.app')

@section('template_title')
    Exam Results
@endsection

@section('content')
    <section class="content container-fluid">
        <form method="POST" action="{{ route('admin.exam-results.update',['sclass' => $sclass->id ,'exam' => $exam->id]) }}"  role="form" enctype="multipart/form-data">
            @csrf

            <div class="form-check">
            <input type="checkbox" name="select-all" id="select-all" />
            <label class="form-check-label" >Select All</label>
            </div>

            @foreach ($sclass->students as $student)
            <div class="form-check form-check-inline">
                {{-- {{ Attendance::where('sclass_id')->where('date', )->get() }} --}}

                <input type="hidden" name="{{$student->id}}" value="0">

                <input type="text" class="form-check-input" name="{{$student->id}}" id="{{ $student->id }}" value='1'  @php
                $results=$student->examResults()->where('exam_id',$exam->id)->get();
                if($attendance->first())
                {
                    // dd($attendance);
                    // $attendance[0]->status? echo'checked' :'';
                    if($attendance[0]->status) echo'checked';
                }
                @endphp>
            <label class="form-check-label" for="{{ $student->id }}">{{ $student->fname.' '.$student->lname }}</label>
        </div>

            @endforeach
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>$('#select-all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    }); </script>
@endsection

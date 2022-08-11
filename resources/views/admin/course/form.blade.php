<div class="box box-info padding-1">
    <div class="box-body">
        @php
        $options = $teachers->pluck('name', 'id');
        $yoptions = $subjects->pluck('name', 'id')
        // dd($teachers);
    @endphp

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $course->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('teacher') }}
            {{ Form::select('teacher_id', $options, $course->teacher_id ,['class' => 'form-control' . ($errors->has('teacher_id') ? ' is-invalid' : '')]); }}
            {!! $errors->first('teacher_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subject') }}
            {{ Form::select('subject_id', $yoptions,$course->subject_id ,['class' => 'form-control' . ($errors->has('subject_id') ? ' is-invalid' : '')]); }}
            {!! $errors->first('subject_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group">

            {!! $errors->first('sclass_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

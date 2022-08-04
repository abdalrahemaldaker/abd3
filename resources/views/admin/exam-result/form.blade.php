<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('exam_id') }}
            {{ Form::text('exam_id', $examResult->exam_id, ['class' => 'form-control' . ($errors->has('exam_id') ? ' is-invalid' : ''), 'placeholder' => 'Exam Id']) }}
            {!! $errors->first('exam_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('student_id') }}
            {{ Form::text('student_id', $examResult->student_id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : ''), 'placeholder' => 'Student Id']) }}
            {!! $errors->first('student_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('course_id') }}
            {{ Form::text('course_id', $examResult->course_id, ['class' => 'form-control' . ($errors->has('course_id') ? ' is-invalid' : ''), 'placeholder' => 'Course Id']) }}
            {!! $errors->first('course_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mark') }}
            {{ Form::text('mark', $examResult->mark, ['class' => 'form-control' . ($errors->has('mark') ? ' is-invalid' : ''), 'placeholder' => 'Mark']) }}
            {!! $errors->first('mark', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
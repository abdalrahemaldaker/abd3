<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $exam->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('year_id') }}
            {{ Form::text('year_id', $exam->year_id, ['class' => 'form-control' . ($errors->has('year_id') ? ' is-invalid' : ''), 'placeholder' => 'Year Id']) }}
            {!! $errors->first('year_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('exam_type_id') }}
            {{ Form::text('exam_type_id', $exam->exam_type_id, ['class' => 'form-control' . ($errors->has('exam_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Exam Type Id']) }}
            {!! $errors->first('exam_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $exam->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
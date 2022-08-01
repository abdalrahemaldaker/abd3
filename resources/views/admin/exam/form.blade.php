<div class="box box-info padding-1">
    <div class="box-body">

        @php
        $options1 = $years->pluck('name', 'id');
        $options2 = $examtypes->pluck('name', 'id');
    @endphp


        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $exam->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Year') }}
            {{ Form::select('year_id', $options1,$exam->year_id ,['class' => 'form-control' . ($errors->has('Year') ? ' is-invalid' : '')]); }}
            {!! $errors->first('year_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('exam_type') }}
            {{ Form::select('exam_type_id', $options2,$exam->exam_type_id ,['class' => 'form-control' . ($errors->has('exam_type') ? ' is-invalid' : '')]); }}
            {!! $errors->first('exam_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', $exam->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

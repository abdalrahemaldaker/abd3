<div class="box box-info padding-1">
    <div class="box-body">
        @php
        $options = $stages->pluck('name', 'id')
    @endphp
        <div class="form-group">

            {{ Form::label('name') }}
            {{ Form::text('name', $subject->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('stage_id') }}
            {{ Form::select('stage_id', $options,$subject->stage_id ,['class' => 'form-control' . ($errors->has('stage_id') ? ' is-invalid' : '')]); }}
            {!! $errors->first('stage_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('max') }}
            {{ Form::number('max', $subject->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : ''), 'placeholder' => 'max']) }}
            {!! $errors->first('max', '<div class="invalid-feedback">:message</div>') !!}
        </div>




    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

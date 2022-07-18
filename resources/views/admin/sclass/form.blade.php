<div class="box box-info padding-1">
    <div class="box-body">
        @php
        $options = $stages->pluck('name', 'id');
        $yoptions = $years->pluck('name', 'id')
    @endphp

        <div class="form-group">
            {{ Form::label('year') }}
            {{ Form::select('year_id', $yoptions,$sclass->year_id ,['class' => 'form-control' . ($errors->has('year_id') ? ' is-invalid' : '')]); }}
            {!! $errors->first('year_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stage') }}
            {{ Form::select('stage_id', $options,$sclass->stage_id ,['class' => 'form-control' . ($errors->has('stage_id') ? ' is-invalid' : '')]); }}
            {!! $errors->first('stage_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

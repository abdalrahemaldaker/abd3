<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('fname') }}
            {{ Form::text('fname', $student->fname, ['class' => 'form-control' . ($errors->has('fname') ? ' is-invalid' : ''), 'placeholder' => 'Fname']) }}
            {!! $errors->first('fname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lname') }}
            {{ Form::text('lname', $student->lname, ['class' => 'form-control' . ($errors->has('lname') ? ' is-invalid' : ''), 'placeholder' => 'Lname']) }}
            {!! $errors->first('lname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('father') }}
            {{ Form::text('father', $student->father, ['class' => 'form-control' . ($errors->has('father') ? ' is-invalid' : ''), 'placeholder' => 'Father']) }}
            {!! $errors->first('father', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $student->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mobile') }}
            {{ Form::text('mobile', $student->mobile, ['class' => 'form-control' . ($errors->has('mobile') ? ' is-invalid' : ''), 'placeholder' => 'Mobile']) }}
            {!! $errors->first('mobile', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('birthdate') }}
            {{ Form::date('birthdate', $student->birthdate, ['class' => 'form-control' . ($errors->has('birthdate') ? ' is-invalid' : ''), 'placeholder' => 'Birthdate']) }}
            {!! $errors->first('birthdate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::textarea('note', $student->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $student->user->email ?? '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

              <div class="form-group">
                {{ Form::label('password') }}
                {{ Form::password( 'password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('cpassword') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('cpassword') ? ' is-invalid' : '')
                    , 'placeholder' => 'cPassword']) }}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

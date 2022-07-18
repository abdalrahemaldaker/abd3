<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
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
                  {{-- <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input type="password" class="form-control" id="cpassword" name="password_confirmation" required value="{{ old('password_confirmation') }}" placeholder="password">
              </div> --}}



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@extends('layouts.app')
@section('title','Edit User')
@section('content')
<section class="section layout_padding">
<div class="container ">
    <div class="row center">


        <div class="card  col-md-8 ">
            <div class="card-header">
                <h1>Edit User</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.users.update',$user) }}" method="post">@csrf @method('put')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name',$user->name) }}" placeholder="someont">
              </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ old('email',$user->email) }}" placeholder="someont@example.com">
                  </div>
                  <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password"   placeholder="password">
                  </div>
                  {{-- <div class="form-group">
                    <label for="cpassword">Confirm password</label>
                    <input type="password" class="form-control" id="cpassword" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="password">
                  </div> --}}
                  <input type="submit" class="btn btn-primary" value="submit">
            </form>
            </div>
          </div>
    </div>
</div>


</section>
@endsection

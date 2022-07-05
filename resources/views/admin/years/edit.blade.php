@extends('layouts.app')
@section('title','Edit Year')
@section('content')
<section class="section layout_padding">
<div class="container ">
    <div class="row center">


        <div class="card  col-md-8 ">
            <div class="card-header">
                <h1>Edit year</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.years.update',$year) }}" method="post">@csrf @method('put')
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
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name',$year->name) }}" placeholder="someont">
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

@extends('layouts.app')
@section('title','Add year')
@section('content')
<section class="section layout_padding">
<div class="container ">
    <div class="row center">


        <div class="card  col-md-8 ">
            <div class="card-header">
                <h1>New year</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.years.store') }}" method="post">@csrf
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
                <input type="number" class="form-control" id="name" name="name" required value="{{ old('name') }}" placeholder="year">
              </div>
            </form>
            </div>
          </div>
    </div>
</div>


</section>
@endsection

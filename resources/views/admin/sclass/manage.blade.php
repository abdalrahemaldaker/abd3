@extends('layouts.app2')

@section('template_title')
    Manage classes
@endsection



@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
    <p>{{ $message }}</p>
</div>
@endif
<form method="POST" action="{{ route('admin.sclasses.fill' , $sclass) }}"  role="form" enctype="multipart/form-data">
    @csrf
    {{-- <div classs="form-group">
        <input class="typeahead form-control" name="student"  aria-autocomplete="list" type="text">
        <div class="form-group">

            {{-- {{ Form::label('name') }} --}}
            {{-- {{ Form::text('name', $subject->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div> --}}
    <div class="ui-widget">
        <label for="birds">Add students </label>
        <input id="birds" class="" size="50" name="students">

    </div>

    <button type="submit" class="btn btn-primary" autocomplete="off">Submit</button>
</form>

<div class="col-sm-12">
    <div class="card">



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>No</th>

                            <th>Fname</th>
                            <th>Lname</th>
                            <th>Father</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $students=$sclass->students;
                           $i=0

                        @endphp
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $student->fname }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->father }}</td>


                                <td>
                                    <form action="{{ route('admin.sclasses.manage',$sclass) }}" method="POST">
                                        <input type="hidden" name="student" value={{ $student->id }}>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>





    </div>
    {{-- {!! $students->links() !!} --}}
</div>





@endsection

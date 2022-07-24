@extends('layouts.app')

@section('template_title')
    Manage classes
@endsection



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

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
    <div classs="form-group">
        <input class="typeahead form-control" name="student"  aria-autocomplete="list" type="text">
        <div class="form-group">

            {{-- {{ Form::label('name') }} --}}
            {{-- {{ Form::text('name', $subject->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!} --}}
        </div>
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
                                    <form action="{{ route('admin.sclasses.manage',$sclass ,$student->id) }}" method="POST">


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




<script src="/js/ajaxlibsjquery1.9.1jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('sclasses.autocomplete-search') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection

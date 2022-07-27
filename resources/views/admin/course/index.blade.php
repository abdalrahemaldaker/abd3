@extends('layouts.app')

@section('template_title')
    Courses
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Course') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.courses.create',$sclass) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Name</th>
										<th>Sclass Id</th>
										<th>Teacher Id</th>
										<th>Subject Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $course->name }}</td>
											<td>{{ $course->sclass->name }}</td>
											<td>{{ $course->teacher->fname.' '.$course->teacher->lname }}</td>
											<td>{{ $course->subject->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.courses.destroy',['sclass'=>$sclass,'course'=>$course->id]) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.courses.show',['sclass'=>$sclass,'course'=>$course->id]) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.courses.edit',['sclass'=>$sclass,'course'=>$course->id]) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
@endsection

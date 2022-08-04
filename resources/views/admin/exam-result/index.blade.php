@extends('layouts.app')

@section('template_title')
    Exam Result
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Exam Result') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.exam-results.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Exam Id</th>
										<th>Student Id</th>
										<th>Course Id</th>
										<th>Mark</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examResults as $examResult)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $examResult->exam_id }}</td>
											<td>{{ $examResult->student_id }}</td>
											<td>{{ $examResult->course_id }}</td>
											<td>{{ $examResult->mark }}</td>

                                            <td>
                                                <form action="{{ route('admin.exam-results.destroy',$examResult->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.exam-results.show',$examResult->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.exam-results.edit',$examResult->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $examResults->links() !!}
            </div>
        </div>
    </div>
@endsection

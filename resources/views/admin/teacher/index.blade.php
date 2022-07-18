@extends('layouts.app')

@section('template_title')
    Teacher
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Teacher') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Fname</th>
										<th>Lname</th>
										<th>Father</th>
										<th>Address</th>
										<th>Note</th>
										<th>Phone</th>
										<th>Mobile</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $teacher->fname }}</td>
											<td>{{ $teacher->lname }}</td>
											<td>{{ $teacher->father }}</td>
											<td>{{ $teacher->address }}</td>
											<td>{{ $teacher->note }}</td>
											<td>{{ $teacher->phone }}</td>
											<td>{{ $teacher->mobile }}</td>

                                            <td>
                                                <form action="{{ route('admin.teachers.destroy',$teacher) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.teachers.show',$teacher->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.teachers.edit',$teacher->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $teachers->links() !!}
            </div>
        </div>
    </div>
@endsection

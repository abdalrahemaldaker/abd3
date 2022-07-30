@extends('layouts.app')

@section('template_title')
    Sclass
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sclass') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.sclasses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>name</th>

										<th>Year</th>
										<th>Stage</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sclasses as $sclass)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $sclass->name}}</td>

											<td>{{ $sclass->year->name }}</td>
											<td>{{ $sclass->stage->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.attendances.edit',$sclass) }}" method="GET">
                                                    <input type="date" name="date" >
                                                    <button type="submit" class="btn btn-sm btn-success"></i>attendance</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sclasses->links() !!}
            </div>
        </div>
    </div>
@endsection

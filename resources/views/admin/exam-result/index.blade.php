@extends('layouts.app')

@section('template_title')
    Exam
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Exam') }}
                            </span>

                             <div class="float-right">

                                  <h3>Choose exam</h3>
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    {{-- <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Name</th>
										<th>Year</th>
										<th>Stage</th>
										<th>Exam Type</th>
										<th>Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $exam->name }}</td>
											<td>{{ $exam->year->name }}</td>
                                            <td>{{ $exam->stage->name }}</td>
											<td>{{ $exam->examtype->name }}</td>
											<td>{{ $exam->date }}</td>

                                            <td>

                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.exam-results.exam',$exam->id) }}"><i class="fa fa-fw fa-eye"></i> Choose</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <form action="{{ route('admin.exam-results.results2') }}" method="GET">
                        @livewire('resultsform')

                        <input type="submit" class="btn btn-sm btn-info" value="Results">
                    </form>




                </div>
                {!! $exams->links() !!}
            </div>
        </div>
    </div>
@endsection

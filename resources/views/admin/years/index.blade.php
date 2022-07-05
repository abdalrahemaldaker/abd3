@extends('layouts.app')

@section('title', 'Manage years')

@section('content')

    <section>
        <div class="container center-align">
            <h1>Users</h1>
            <h3><a href="{{ route('admin.years.create') }}">Create a year</a></h3>

            <table class="table ">
                <thead class="thead-dark">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    @foreach ($years as $year)
                        <tr>
                            <td>{{ $year->id }}</td>
                            <td><a href="{{ route('admin.years.edit', $year) }}">{{ $year->name }}</a></td>
                            <td><a class="btn btn-primary" href="{{ route('admin.years.edit', $year) }}"> edit</a> |    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{ $year->id }}">Delete</button></td>
                            <div class="modal fade" id="Modal{{ $year->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Do you want to delete this item
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <form action="{{ route('admin.years.destroy',$year) }}" method="POST">@csrf @method('Delete')<input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="delete"></form>
                                    </div>
                                  </div>
                                </div>
                        </tr>

                    @endforeach
                    {{ $years->links() }}
                </tbody>
            </table>
        </div>
    </section>
@endsection

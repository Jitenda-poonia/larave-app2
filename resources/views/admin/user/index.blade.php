@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">User List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>
                <a href="{{ route('user.create') }}">Add user</a>>>user list
            </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">

                        @if (session()->has('success'))
                            <div class="alert alert-success" id="msg">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        {{-- message end --}}

                        <table class="table table-striped table-bordered table-hover display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-edit"></i>Edit</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i
                                                        class="glyphicon glyphicon-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

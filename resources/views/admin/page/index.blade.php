@extends('layouts.admin')
@push('title')
    <title>page index</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">page List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>
                <a href="{{ route('page.create') }}">Add Page</a>>>Page list
            </h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        {{-- message show --}}
                        @if (session()->has('success'))
                            {{-- //message unset --}}
                            <div class="alert alert-success" id="msg">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Title</th>
                                    <th>Heading</th>
                                    <th>Ordering</th>
                                    <th>satuts</th>
                                    <th>Url key</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($pages as $page)
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->heading }}</td>
                                        <td>{{ $page->ordering }}</td>
                                        <td>{{ ($page->status == 1) ? 'Enable' : 'Disable' }}</td>
                                        <td>{{ $page->url_key }}</td>
                                        <td>
                                            <img src="{{asset('storage/upload/'.$page->banner_image)}}" style="width:40%; float:left;padding:10px;">
                                    

                                        </td>
                                        {{-- <td>{{$page->banner_image}}</td> --}}
                                        <td>
                                            <a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-edit"></i>Edit</a>
                                            <form action="{{ route('page.destroy', $page->id) }}" method="POST">
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

@extends('layout.app')
@section('title')
    create-test
@endsection
@section('content')
    @if (@session('add'))
        <div class="alert alert-success">
            {{ session('add') }}
        </div>
    @endif
    @if (session('update'))
        <div class="alert alert-info">
            {{ session('update') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif
    @if ($tests->isNotEmpty())
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Age</th>
                <th scope="col">Birth</th>
                <th scope="col">Dep</th>
                <th scope="col">Gender</th>
                <th scope="col">Created At</th>
                <th scope="col">Update At</th>
                <th>الاجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $test)
                <tr>
                    <th scope="row">{{ $test->id }}</th>
                    <td>{{ $test->first_name }}</td>
                    <td>{{ $test->last_name }}</td>
                    <td>{{ $test->age }}</td>
                    <td>{{ $test->birth }}</td>
                    <td>{{ $test->dep }}</td>
                    <td>{{ $test->gender }}</td>
                    <td>{{ $test->created_at }}</td>
                    <td>{{ $test->updated_at }}</td>
                    <td style="display: flex;flex-dicration: row;">
                        <a href="{{ route('test.edit', $test->id) }}" style="margin-right:2px"><button
                                class="btn btn-warning">Edit</button></a>
                        <form action="{{ route('test.destroy', $test->id) }}" method="POST" style="margin-right:2px">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tests->links() }}
    @else
    <div class="alert alert-info">
        <center><h1>Table is empty</h1></center>
    </div>
    @endif
    <center><a href="{{ route('test.create') }}"><button class="btn btn-primary">Add Student</button></a></center>
@endsection

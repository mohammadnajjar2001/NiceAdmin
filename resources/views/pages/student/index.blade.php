@extends('layout.app')
@section('title')
    Students
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Show All Students</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('student.index') }}">Students</a></li>
            </ol>
        </nav>
    </div>
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

    <button id="toggleFilter" class="btn btn-warning mb-3"><i class="fa fa-search search-icon" id="toggleFilterForm"></i>
        Filter
    </button>

    <div id="filterTable"style="display: none;">
        <table class="form-control d-flex justify-content" >
            <tr>
                <td colspan="6">
                    <center>
                        <h1><i><code>Filter By Anything</code></h1></i>
                    </center>
                </td>
            </tr>
            <tr>
                <th style="padding-left: 10px;">First Name</th>
                <th style="padding-left: 10px;">Last Name</th>
                <th style="padding-left: 10px;">Age</th>
                <th style="padding-left: 10px;">Birth</th>
                <th style="padding-left: 10px;">Dep</th>
                <th style="padding-left: 10px;">Gender</th>
            </tr>

            <tr>
                <form action="{{ URL::current() }}" class="form-control d-flex justify-content" method="GET">
                    <td><input type="text" name="first_name" class="form-control mx-2" value="{{ $first_name }}"></td>
                    <td><input type="text" name="last_name" class="form-control mx-2" value="{{ $last_name }}"></td>
                    <td><input type="text" name="age" class="form-control mx-2" value="{{ $age }}">
                        <select name="age_C" id="" class="form-control mx-2">
                            <option value="=" {{ request('age_C') == '=' ? 'selected' : '' }}>Equals</option>
                            <option value=">" {{ request('age_C') == '>' ? 'selected' : '' }}>Greater</option>
                            <option value="<" {{ request('age_C') == '<' ? 'selected' : '' }}>Younger</option>
                            <option value=">=" {{ request('age_C') == '>=' ? 'selected' : '' }}>Equals OR Greater
                            </option>
                            <option value="<=" {{ request('age_C') == '<=' ? 'selected' : '' }}>Equals OR Younger
                            </option>
                        </select>
                    </td>
                    <td><input type="date" name="birth" class="form-control mx-2" value="{{ $birth }}">
                        <select name="date_C" id="" class="form-control mx-2">
                            <option value="=" {{ request('date_C') == '=' ? 'selected' : '' }}>Equals</option>
                            <option value="<" {{ request('date_C') == '<' ? 'selected' : '' }}>Before</option>
                            <option value=">" {{ request('date_C') == '>' ? 'selected' : '' }}>After</option>
                            <option value="<=" {{ request('date_C') == '<=' ? 'selected' : '' }}>Equals OR Before
                            </option>
                            <option value=">=" {{ request('date_C') == '>=' ? 'selected' : '' }}>Equals OR After
                            </option>
                        </select>
                    </td>
                    <td><input type="text" name="dep" class="form-control mx-2" value="{{ $dep }}"></td>
                    <td>
                        <select name="gender" id="" class="form-control mx-2">
                            <option value="">All</option>
                            <option value="male" {{ $gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </td>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <button class="btn btn-primary mx-2" style="margin: 5px 0px;" type="submit">Filter</button>
                    <a href="{{ URL::current() }}"><button class="btn btn-info mx-2" style="margin: 5px 0px;"
                            type="button">Clean Filter
                </td>
            </tr>
            </form>
            </tr>
        </table>
    </div>

    @if ($students->isNotEmpty())
        <table class="table">
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
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->birth }}</td>
                        <td>{{ $student->dep }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td>{{ $student->updated_at }}</td>
                        <td style="display: flex;flex-direction: row;">
                            <a href="{{ route('student.edit', $student->id) }}" style="margin-right:2px"><button
                                    class="btn btn-warning fas fa-edit mx-2"></button></a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                style="margin-right:2px">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger fas fa-trash mx-2" type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    @else
        <div class="alert alert-info">
            <center>
                <h1>Table is empty</h1>
            </center>
        </div>
    @endif
    <center><a href="{{ route('student.create') }}"><button class="btn btn-primary">Add Student</button></a></center>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endpush

@push('scripts')
    <script>
        document.getElementById('toggleFilter').addEventListener('click', function() {
            const filterTable = document.getElementById('filterTable');
            if (filterTable.style.display === 'none') {
                filterTable.style.display = 'block';
            } else {
                filterTable.style.display = 'none';
            }
        });
    </script>
@endpush

@extends('layout.app')


@section('title')
    Create-Student
@endsection




@section('content')
<div class="pagetitle">
    <h1>Create Student</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
            <li class="breadcrumb-item active"><a >Create</a></li>
        </ol>
    </nav>
</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('student.store') }}" class="form-control" method="POST">
            @csrf
            <label for="">First Name : </label>
            <input type="text" name="first_name" placeholder="ادخل الاسم الاول" class="form-control mb-2" value="{{ old('first_name') }}">
            <label for="">Last Name : </label>
            <input type="text" name="last_name" placeholder="ادخل الكنية" class="form-control mb-2" value="{{ old('last_name') }}">
            <label for="">Age : </label>
            <input type="text" name="age" placeholder="ادخل عمرك" class="form-control mb-2" value="{{ old('age') }}">
            <label for="">Birth : </label>
            <input type="date" name="birth" class="form-control mb-2" value="{{ old('birth') }}">
            <label for="">Dep : </label>
            <input type="text" name="dep" placeholder="ادخل تخصصك" class="form-control mb-3" value="{{ old('dep') }}">
            <label for="">Gender</label>
            <select name="gender" id="">
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old( 'gender') == 'female' ? 'selected' : ''}}>Female</option>
            </select>
            <center><button class="btn btn-primary">Send</button></center>
        </form>

@endsection

@push('styles')
    <style>
        label {
            font-weight: bolder;
        }

        input {
            margin-left: 5px;
        }

        button {
            margin: 5px 0px;
        }
    </style>
@endpush

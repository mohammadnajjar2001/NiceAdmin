@extends('layout.app')


@section('title')
    Edit-student
@endsection


@section('content')
    <div class="pagetitle">
        <h1>Edit Student</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                <li class="breadcrumb-item active"><a>Edit</a></li>
            </ol>
        </nav>
    </div>


    {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}


    {{-- <form action="{{ route('student.update', $student->id) }}" class="form-control" method="POST">
        @csrf
        @method('PATCH')
        <label for="">First Name : </label>
        <input type="text" name="first_name" placeholder="ادخل الاسم الاول" class="form-control mb-2"
            value="{{ $student->first_name }}">
        @error('first_name')
            <div>
                <h6 class="text-danger">{{ $message }}</h6>
            </div>
        @enderror
        <label for="">Last Name : </label>
        <input type="text" name="last_name" placeholder="ادخل الكنية" class="form-control mb-2"
            value="{{ $student->last_name }}">
        @error('last_name')
            <div>
                <h6 class="text-danger">{{ $message }}</h6>
            </div>
        @enderror
        <label for="">Age : </label>
        <input type="text" name="age" placeholder="ادخل عمرك" class="form-control mb-2" value="{{ $student->age }}">
        @error('age')
            <div>
                <h6 class="text-danger">{{ $message }}</h6>
            </div>
        @enderror
        <label for="">Birth : </label>
        <input type="date" name="birth" class="form-control mb-2" value="{{ $student->birth }}">
        @error('birth')
            <div>
                <h6 class="text-danger">{{ $message }}</h6>
            </div>
        @enderror
        <label for="">Dep : </label>
        <input type="text" name="dep" placeholder="ادخل تخصصك" class="form-control mb-3"
            value="{{ $student->dep }}">
        @error('dep')
            <div>
                <h6 class="text-danger">{{ $message }}</h6>
            </div>
        @enderror
        <select name="gender" class="form-control mb-3">
            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
        </select>
        <center><button class="btn btn-primary">Send</button></center>
    </form> --}}








    <form action="{{ route('student.update', $student->id) }}" class="form-control" method="POST">
        @csrf
        @method('PATCH')
        <x-form.input name="first_name" placeholder="ادخل الاسم الاول" lable="First Name : "
            value="{{ $student->first_name }}" />
        <x-form.input name="last_name" placeholder="ادخل الكنية" lable="Last Name : " value="{{ $student->last_name }}" />
        <x-form.input name="age" placeholder="ادخل عمرك" lable="Age : " value="{{ $student->age }}" />
        <x-form.input name="birth" type="date" lable="Birth : " value="{{ $student->birth }}" />
        <x-form.input name="dep" placeholder="ادخل تخصصك" lable="Dep : " value="{{ $student->dep }}" />
        <label for="">Gender</label>
        <select name="gender" class="form-control mb-3">
            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
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

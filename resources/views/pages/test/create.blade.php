@extends('layout.app')


@section('title')
    create-test
@endsection




@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('test.store') }}" class="form-control" method="POST">
        @csrf
        <label for="">First Name : </label>
        <input type="text" name="first_name" placeholder="ادخل الاسم الاول" class="form-control mb-2">
        <label for="">Last Name : </label>
        <input type="text" name="last_name" placeholder="ادخل الكنية" class="form-control mb-2">
        <label for="">Age : </label>
        <input type="text" name="age" placeholder="ادخل عمرك" class="form-control mb-2">
        <label for="">Birth : </label>
        <input type="date" name="birth" class="form-control mb-2">
        <label for="">Dep : </label>
        <input type="text" name="dep" placeholder="ادخل تخصصك" class="form-control mb-3">
        <label for="">Gender</label>
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
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

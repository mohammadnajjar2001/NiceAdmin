@extends('layout.app')
@section('title')
    Edit My Work
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                <li class="breadcrumb-item active"><a>edit-work</a></li>
            </ol>
        </nav>
    </div>
    <x-alert type="success" />
    <form action="{{ route('work.update' , $work->id ) }}" class="form-control" method="POST">
        @csrf
        @method('PATCH')
        <x-form.input name="name_work" placeholder="ادخل وظيفتك" lable="Work : " value="{{ $work->name_work }}" />
        <center><button class="btn btn-primary" type="submit">Save</button></center>
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

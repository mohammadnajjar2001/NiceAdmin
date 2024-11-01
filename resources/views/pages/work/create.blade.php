@extends('layout.app')
@section('title')
    Create My Work
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                <li class="breadcrumb-item active"><a>create-work</a></li>
            </ol>
        </nav>
    </div>
    <x-alert type="success" />
    <form action="{{ route('work.store') }}" class="form-control" method="POST">
        @csrf
        <x-form.input name="name_work" placeholder="ادخل وظيفتك" lable="Work : " value="" />
        <center><button class="btn btn-primary" type="submit">Send</button></center>
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

@extends('layout.app')
@section('title')
    Edit My Profile
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                <li class="breadcrumb-item active"><a>edit-profile</a></li>
            </ol>
        </nav>
    </div>
    <x-alert type="success" />
    <form action="{{ route('phonemy.update', Auth::user()->id) }}" class="form-control" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.input name="number" placeholder="ادخل رقم الهاتف" label="Number Phone: " value="{{ $user->number ?? '' }}" />
        <x-form.input name="age" placeholder="ادخل عمرك" label="Your Age: " value="{{ $user->age ?? '' }}" />
        <x-form.input name="address" placeholder="ادخل موقعك" label="Your Address: " value="{{ $user->address ?? '' }}" />
            <div class="form-group">
                <label for="image">اختر صورة:</label>
                @if(isset($user->image) && file_exists(public_path('images/' . $user->image)))
                    <div class="mb-2">
                        <img src="{{ asset('images/' . $user->image) }}" alt="صورة المستخدم" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>

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

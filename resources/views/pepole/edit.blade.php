@extends('dashboard')

@section('title')
    Edit
@endsection
@section('titlepage')
    edit-pepole
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashbord.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">edit-pepole</li>
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">تعديل بيانات الشخص</h2>
    <!-- نموذج تعديل بيانات الشخص -->
    <form action="{{ route('pepole.update', $person->id) }}" method="POST">
        @csrf
        @method('patch') <!-- نستخدم PUT أو PATCH لتحديث البيانات -->

        <div class="mb-3">
            <label for="first_name" class="form-label">الاسم الأول</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                value="{{ $person->first_name }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">اسم العائلة</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                value="{{ $person->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">الجنس</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Male" {{ $person->gender == 'Male' ? 'selected' : '' }}>زلمة</option>
                <option value="Female" {{ $person->gender == 'Female' ? 'selected' : '' }}>حرمة</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $person->phone }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث البيانات</button>
        <a href="{{ route('pepole.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
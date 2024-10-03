@extends('dashboard')

@section('title')
    Add-pepole
@endsection
@section('titlepage')
    Add-pepole
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashbord.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">add-pepole</li>
@endsection

@section('content')

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container">
        <h2 class="mb-4">إنشاء مستخدم جديد</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pepole.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">الاسم الأول</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">اسم العائلة</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">الجنس</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                            {{ old('gender') == 'ذكر' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">ذكر</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                            {{ old('gender') == 'أنثى' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="female">أنثى</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>

    <!-- تضمين Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
            direction: ltr;
            text-align: right;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush


@push('scripts')
    
@endpush


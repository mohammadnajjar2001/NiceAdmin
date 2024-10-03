@extends('dashboard')

@section('title')
    Show
@endsection
@section('titlepage')
    Show-pepole
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashbord.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Show-pepole</li>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">قائمة الأشخاص</h2>

        <!-- تحقق من وجود الرسالة في الجلسة -->
        @if (session('added'))
            <div class="alert alert-success">
                {{ session('added') }}
            </div>
        @endif
        <!-- عرض رسالة النجاح إن وجدت -->
        @if (session('updated'))
            <div class="alert alert-success">
                {{ session('updated') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم الأول</th>
                    <th>اسم العائلة</th>
                    <th>الجنس</th>
                    <th>الهاتف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pepole as $person)
                    <tr>
                        <td>{{ $person->first_name }}</td>
                        <td>{{ $person->last_name }}</td>
                        <td>{{ $person->gender }}</td>
                        <td>{{ $person->phone }}</td>
                        <td>
                            <!-- روابط التعديل والحذف -->
                            <a href="{{ route('pepole.edit', $person->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                            <form action="{{ route('pepole.destroy', $person->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- إضافة الزر لتوجيه المستخدم إلى صفحة إضافة الأشخاص -->
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('pepole.create') }}" class="btn btn-primary">Add Pepole</a>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush

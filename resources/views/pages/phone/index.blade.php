{{ $i = 1 }}
@extends('layout.app')
@section('title', 'Show Profile')
@section('content')

    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif
    <x-alert type="success" />
    <x-alert type="info" />
    <div class="pagetitle">
        <h1>My Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('my.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                <li class="breadcrumb-item active">Show Profile</li>
            </ol>
        </nav>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4">معلومات الحساب</h1>

        @if ($user)
            <div class="card shadow-lg border-primary">
                <div class="card-body text-center">
                    @if (isset($user->image) && file_exists(public_path('images/' . $user->image)))
                        <img id="myphoto" src="{{ asset('images/' . $user->image) }}" alt="صورة المستخدم"
                            class="rounded-circle profile-image mb-3" />
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="صورة المستخدم"
                            class="rounded-circle profile-image mb-3" />
                    @endif
                    <h5 class="card-title name-style">{{ $person->name }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>رقم الهاتف:</strong> <span
                                class="text-muted">{{ $user->number }}</span></li>
                        <li class="list-group-item"><strong>العمر:</strong> <span
                                class="text-muted">{{ $user->age }}</span></li>
                        <li class="list-group-item"><strong>العنوان:</strong> <span
                                class="text-muted">{{ $user->address }}</span></li>
                    </ul>
                </div>

                <!-- قسم عرض الوظائف -->
                <div class="card-body text-center">
                    <h5 class="card-title mt-4">My Works</h5>
                    @if ($works->isEmpty())
                        <div class="alert alert-warning text-center" role="alert">
                            لا توجد لديك أي وظيفة
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Work</th>
                                    <th scope="col">created_at</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($works as $work)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $work->name_work }}</td>
                                        <td>{{ $work->created_at }}</td>
                                        <td style="display: flex;flex-direction: row;">
                                            <a href="{{ route('work.edit', $work->id) }}" style="margin-right:2px">
                                                <button class="btn btn-warning fas fa-edit mx-2"></button>
                                            </a>
                                            <a href="{{ route('work.create', $work->id) }}"
                                                style="margin-right:2px"><button
                                                    class="btn btn-warning fas fa-add mx-2"></button></a>
                                            <form action="{{ route('work.destroy', $work->id) }}" method="POST"
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
                    @endif
                </div>


                <div class="card-footer text-muted text-center">
                    <a href="{{ route('phonemy.create') }}" class="btn btn-primary btn-lg">تعديل المعلومات</a>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                لا توجد معلومات حساب متاحة للمستخدم.
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .name-style {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
            color: #007bff;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            background-color: rgba(0, 123, 255, 0.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        #myphoto {
            margin-top: 20px;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
            color: #007bff;
        }

        .list-group-item {
            font-size: 1.1rem;
            padding: 15px;
        }

        .btn-lg {
            padding: 10px 20px;
            font-size: 1.1rem;
        }

        .pagetitle h1 {
            font-size: 2rem;
            color: #343a40;
        }
    </style>
@endpush

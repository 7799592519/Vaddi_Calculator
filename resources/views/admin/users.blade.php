@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">👥 రిజిస్టర్ అయిన యూజర్లు</h2>
        <span class="badge bg-success fs-5">మొత్తం యూజర్లు: {{ $users->count() }}</span>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0 table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>పేరు</th>
                        <th>ఈమెయిల్</th>
                        <th>జాయిన్ అయిన తేదీ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="fw-bold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-M-Y h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>అప్పుల జాబితా</h2>
    <a href="{{ route('interest.create') }}" class="btn btn-success">+ కొత్త రికార్డ్</a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>పేరు</th>
                    <th>అసలు (₹)</th>
                    <th>వడ్డీ రేటు & రకం</th>
                    <th>తేదీలు</th>
                    <th class="text-danger">వడ్డీ (₹)</th>
                    <th class="text-success">మొత్తం (₹)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr>
                        <td class="fw-bold">{{ $record->person_name }}</td>
                        <td>₹{{ number_format($record->principal_amount, 2) }}</td>
                        <td>
                            {{ $record->interest_rate }}
                            @if($record->interest_type == 'monthly_rupees')
                                (రూ. వడ్డీ/నెలకు)
                            @else
                                (% వడ్డీ/సంవత్సరానికి)
                            @endif
                        </td>
                        <td>
                            <small>
                                <strong>నుండి:</strong> {{ \Carbon\Carbon::parse($record->start_date)->format('d-M-Y') }}<br>
                                <strong>వరకు:</strong> {{ \Carbon\Carbon::parse($record->end_date)->format('d-M-Y') }}
                            </small>
                        </td>
                        <td class="text-danger fw-bold">₹{{ number_format($record->total_interest, 2) }}</td>
                        <td class="text-success fw-bold fs-5">₹{{ number_format($record->final_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">ఎలాంటి రికార్డులు లేవు. కొత్తది క్రియేట్ చేయండి.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">కొత్త అప్పు వివరాలు నమోదు చేయండి</h5>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('interest.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">పేరు (Person Name)</label>
                        <input type="text" name="person_name" class="form-control" required placeholder="ఉదా: రాము">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">అసలు మొత్తం (Principal ₹)</label>
                            <input type="number" name="principal_amount" class="form-control" required placeholder="10000">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">వడ్డీ రేటు (Interest Rate)</label>
                            <input type="number" step="0.01" name="interest_rate" class="form-control" required placeholder="ఉదా: 2">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">వడ్డీ రకం</label>
                        <select name="interest_type" class="form-select" required>
                            <option value="monthly_rupees">నూటికి నెలకు (రూపాయల్లో - బారు వడ్డీ)</option>
                            {{-- <option value="yearly_percentage">సంవత్సరానికి శాతం (Yearly %)</option> --}}
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">అప్పు ఇచ్చిన తేదీ (Start Date)</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">లెక్క చూసే తేదీ (End Date)</label>
                            <input type="date" name="end_date" class="form-control">
                            <small class="text-muted">ఖాళీగా వదిలేస్తే ఈ రోజు తేదీ తీసుకుంటుంది.</small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">సేవ్ చేయి & వడ్డీ లెక్కించు</button>
                    <a href="{{ route('interest.index') }}" class="btn btn-secondary w-100 mt-2">వెనక్కి (Back)</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

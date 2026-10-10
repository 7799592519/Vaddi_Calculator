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
    <div class="container mt-5 mb-5 p-4 bg-light rounded">
    <h2 class="h4 text-primary">వడ్డీ (Interest) అంటే ఏమిటి?</h2>
    <p>మనం ఎవరికైనా అప్పు ఇచ్చినప్పుడు లేదా తీసుకున్నప్పుడు, అసలు మొత్తంతో పాటు అదనంగా చెల్లించే మొత్తాన్ని 'వడ్డీ' (Interest) అంటారు. మన రెండు తెలుగు రాష్ట్రాల్లో (AP & TS) సాధారణంగా రూపాయి వడ్డీ, రెండు రూపాయల వడ్డీ అని నెలకు లెక్కకడతారు (నెలవారీ వడ్డీ).</p>

    <h3 class="h5 mt-4 text-secondary">బారు వడ్డీ (Simple Interest) మరియు చక్ర వడ్డీ (Compound Interest) కి తేడా</h3>
    <ul>
        <li><strong>బారు వడ్డీ (Simple Interest):</strong> ఇది కేవలం మనం తీసుకున్న అసలు (Principal) మీద మాత్రమే లెక్కించబడుతుంది. ఎన్ని నెలలు లేదా సంవత్సరాలు అయినా అసలు మారదు, వడ్డీ స్థిరంగా ఉంటుంది.</li>
        <li><strong>చక్ర వడ్డీ (Compound Interest):</strong> దీనిలో ప్రతి నెలకు లేదా సంవత్సరానికి వచ్చిన వడ్డీని తిరిగి అసలుకి కలుపుతారు. ఆ తర్వాతి కాలానికి ఆ మొత్తం మీద మళ్లీ వడ్డీ లెక్కిస్తారు. దీన్నే వడ్డీ మీద వడ్డీ అంటారు.</li>
    </ul>

    <h3 class="h5 mt-4 text-secondary">ఈ వడ్డీ క్యాలిక్యులేటర్ ఎలా వాడాలి?</h3>
    <ol>
        <li>ముందుగా <strong>అసలు మొత్తం (Principal Amount)</strong> ఎంటర్ చేయండి.</li>
        <li>వడ్డీ రేటు (ఉదాహరణకు: 2 రూపాయలు లేదా 2%) ఎంటర్ చేయండి.</li>
        <li>అప్పు తీసుకున్న తేదీ మరియు తిరిగి ఇస్తున్న తేదీని ఎంచుకోండి.</li>
        <li>'లెక్కించు' (Calculate) బటన్ నొక్కగానే మీకు మొత్తం కట్టాల్సిన వడ్డీ మరియు అసలుతో కలిపిన పూర్తి మొత్తం కనిపిస్తుంది.</li>
    </ol>
</div>
</div>

@endsection

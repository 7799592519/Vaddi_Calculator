@extends('layouts.app')

@section('content')
<div class="container text-center mt-5 pt-4">
    <h1 class="display-4 text-primary fw-bold mb-3">💰 వడ్డీ లెక్కల యాప్‌కు స్వాగతం!</h1>
    <p class="lead text-secondary mb-5">
        ఆంధ్రప్రదేశ్ మరియు తెలంగాణలో వాడుకలో ఉన్న నెలవారీ వడ్డీ (రూపాయి, రెండు రూపాయల వడ్డీ) మరియు చక్ర వడ్డీలను సులువుగా, ఖచ్చితంగా లెక్కించుకోండి.
    </p>

    <div class="mb-5">
        @auth
            <a href="{{ route('interest.index') }}" class="btn btn-success btn-lg px-5 shadow">
                మీ వడ్డీ లెక్కలు చూడండి ➔
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 me-3 shadow">
                Log in (లాగిన్)
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-5 shadow">
                Register (కొత్త అకౌంట్)
            </a>
        @endauth
    </div>

    <div class="row mt-5 pt-4 text-start">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 border-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title text-primary">🔒 100% సురక్షితం</h5>
                    <p class="card-text text-muted">మీరు లెక్కించే వడ్డీ వివరాలు కేవలం మీ అకౌంట్‌లో మాత్రమే ఉంటాయి. వేరే ఎవరికీ కనిపించవు.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 border-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title text-primary">⚡ సులువైన లెక్కలు</h5>
                    <p class="card-text text-muted">ఎలాంటి కష్టమైన ఫార్ములాలు లేకుండా, తేదీలు ఎంచుకుని సులభంగా వడ్డీ లెక్కించవచ్చు.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 border-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title text-primary">📱 మొబైల్ ఫ్రెండ్లీ</h5>
                    <p class="card-text text-muted">కంప్యూటర్‌లోనే కాకుండా మీ మొబైల్ ఫోన్‌లో కూడా ఎంతో చక్కగా, వేగంగా పనిచేస్తుంది.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

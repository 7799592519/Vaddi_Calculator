@extends('layouts.app')

@section('content')
<div class="container text-center mt-5 pt-4">
    <h1 class="display-4 text-primary fw-bold mb-3">💰 వడ్డీ లెక్కల యాప్‌కు స్వాగతం!</h1>
    <p class="lead text-secondary mb-5">
        ఆంధ్రప్రదేశ్ మరియు తెలంగాణలో వాడుకలో ఉన్న నెలవారీ వడ్డీ (రూపాయి, రెండు రూపాయల వడ్డీ) మరియు చక్ర వడ్డీలను సులువుగా, ఖచ్చితంగా లెక్కించుకోండి.
    </p>

    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5 px-3">
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
<!-- FAQs Section for AdSense -->
    <div class="row mt-5 pt-4 mb-5 text-start">
        <div class="col-12">
            <h3 class="text-primary fw-bold mb-4">సాధారణంగా అడిగే ప్రశ్నలు (FAQs)</h3>

            <div class="accordion shadow-sm" id="vaddiFaqAccordion">

                <!-- FAQ 1 -->
                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="faqHeadingOne">
                        <button class="accordion-button fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                            రూపాయి వడ్డీ, రెండు రూపాయల వడ్డీ అంటే ఏమిటి?
                        </button>
                    </h2>
                    <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#vaddiFaqAccordion">
                        <div class="accordion-body text-muted">
                            మన తెలుగు రాష్ట్రాల్లో (ఆంధ్రప్రదేశ్, తెలంగాణ) వడ్డీని నెలకు 100 రూపాయల మీద లెక్కకడతారు. నెలకు 100 కి 1 రూపాయి వడ్డీ అయితే దాన్ని "రూపాయి వడ్డీ" (సంవత్సరానికి 12%) అని, నెలకు 100 కి 2 రూపాయలు అయితే దాన్ని "రెండు రూపాయల వడ్డీ" (సంవత్సరానికి 24%) అని అంటారు. మన యాప్‌లో మీరు నేరుగా ఇలా వడ్డీ రేటును ఇచ్చి సులభంగా లెక్కించుకోవచ్చు.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                        <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                            సాధారణ వడ్డీ (బారు వడ్డీ) కి, చక్ర వడ్డీకి తేడా ఏమిటి?
                        </button>
                    </h2>
                    <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#vaddiFaqAccordion">
                        <div class="accordion-body text-muted">
                            సాధారణ వడ్డీ (Simple Interest) లో అసలు మొత్తంపై మాత్రమే ప్రతి నెలా లేదా ఏడాదీ వడ్డీ లెక్కిస్తారు. కానీ చక్ర వడ్డీ (Compound Interest) లో అసలుతో పాటు, అంతకుముందు వచ్చిన వడ్డీని కూడా కలిపి ఆ మొత్తం మీద మళ్ళీ వడ్డీ లెక్కిస్తారు. దీన్నే వాడుక భాషలో "వడ్డీ మీద వడ్డీ" అని కూడా అంటారు.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="faqHeadingThree">
                        <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                            ఈ వడ్డీ లెక్కల యాప్ నాకెలా ఉపయోగపడుతుంది?
                        </button>
                    </h2>
                    <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#vaddiFaqAccordion">
                        <div class="accordion-body text-muted">
                            మీరు తీసుకున్న లేదా ఇచ్చిన అప్పులకు సంబంధించిన అసలు, వడ్డీ శాతం, మరియు తేదీలను ఎంటర్ చేస్తే చాలు. ఎలాంటి కన్ఫ్యూజన్ లేకుండా నెలలు, మిగిలిన రోజులతో సహా వడ్డీని ఖచ్చితంగా లెక్కించి చూపిస్తుంది. మీరు ఒకసారి లాగిన్ అయి ఈ వివరాలను భవిష్యత్తు కోసం మీ అకౌంట్‌లో 100% సురక్షితంగా సేవ్ చేసుకోవచ్చు.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.default')

@section('content')

<!-- HERO FINAL -->
<section class="jp-final-hero">
    <div class="jp-final-overlay"></div>

    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6">
                <div class="jp-final-content">

                    <span class="jp-final-badge">
                        {{ translate(577) }}
                    </span>

                    <h1 class="jp-final-title">
                        {{ translate(578) }}
                    </h1>

                    <p class="jp-final-desc">
                        {{ translate(579) }}
                    </p>

                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-lg-6">
                <div class="jp-final-image">
                    <img src="{{ asset_img('slider/style1/h1-1.jpg') }}" alt="{{ SITE_NAME }} financement">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- LOAN CALCULATOR -->
<section class="jp-loan-calculator">
    <div class="container jp-loan-calculator-container">
        <div class="jp-calculator-wrapper">
                    <div class="jp-calculator-header">
                        <div class="jp-calculator-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <h2 class="jp-calculator-title">{{ translate(580) }}</h2>
                        <p class="jp-calculator-desc">{{ translate(581) }}</p>
                    </div>

                    @php
                        $homeLoanLocale = app()->getLocale();
                        $homeLoanMin = loan_min_amount_for_locale($homeLoanLocale);
                        $homeLoanMax = loan_max_amount_for_locale($homeLoanLocale);
                        $homeLoanCurrency = loan_currency_code_for_locale($homeLoanLocale);
                        $homeLoanNumberLocale = [
                            'ch' => 'de-CH',
                            'fr' => 'fr-CH',
                            'de' => 'de-AT',
                            'en' => 'en-GB',
                        ][$homeLoanLocale] ?? 'fr-CH';
                        $homeLoanAmountOptions = loan_amount_options_for_locale($homeLoanLocale);
                        $homeDisplayedTeagCalc = preg_replace('/\s*%$/', ' %', str_replace('.', ',', TEAG));
                    @endphp

                    <div class="jp-calculator-grid">
                        <div class="jp-calculator-left">
                            <div class="jp-form-group">
                                <label class="jp-form-label">{{ translate(582) }}</label>
                                <div class="jp-range-wrapper">
                                    <div class="jp-range-meta">
                                        <span>{{ format_loan_money($homeLoanMin, $homeLoanCurrency) }}</span>
                                        <span>{{ format_loan_money($homeLoanMax, $homeLoanCurrency) }}</span>
                                    </div>
                                    <input type="range" id="loan-amount" class="jp-range-slider" min="{{ $homeLoanMin }}" max="{{ $homeLoanMax }}" step="1000" value="{{ $homeLoanMin }}">
                                    <div class="jp-range-value">
                                        <span id="loan-amount-display">{{ number_format($homeLoanMin, 0, ',', ' ') }}</span>
                                        <span class="jp-currency">{{ $homeLoanCurrency }}</span>
                                    </div>
                                </div>
                                <div class="jp-amount-buttons">
                                    @foreach($homeLoanAmountOptions as $amount)
                                        <button type="button" class="jp-amount-btn" data-amount="{{ $amount }}">
                                            {{ format_loan_money($amount, $homeLoanCurrency, floor($amount) == $amount ? 0 : 0) }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="jp-form-group">
                                <label class="jp-form-label">{{ translate(583) }}</label>
                                <div class="jp-range-wrapper">
                                    <div class="jp-range-meta">
                                        <span>12 {{ translate(471) }}</span>
                                        <span>240 {{ translate(471) }}</span>
                                    </div>
                                    <input type="range" id="loan-duration" class="jp-range-slider" min="12" max="240" step="12" value="24">
                                    <div class="jp-range-value">
                                        <span id="loan-duration-display">24</span>
                                        <span class="jp-duration-unit">{{ translate(471) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="jp-duration-options">
                                <label class="jp-form-label">{{ translate(470) }}</label>
                                <div class="jp-duration-buttons">
                                    @foreach(LOAN_DURATION_OPTIONS as $months)
                                        <button type="button" class="jp-duration-btn" data-duration="{{ $months }}">
                                            {{ $months }} {{ translate(471) }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="jp-calculator-right">
                            <div class="jp-results-card">
                                <div class="jp-results-header">
                                    <h3>{{ translate(477) }}</h3>
                                    <p>{{ translate(480) }}</p>
                                    <div class="jp-results-chips">
                                        <span class="jp-results-chip" id="summary-amount">{{ format_loan_money($homeLoanMin, $homeLoanCurrency) }}</span>
                                        <span class="jp-results-chip" id="summary-duration">24 {{ translate(471) }}</span>
                                    </div>
                                </div>

                                <div class="jp-monthly-hero">
                                    <span class="jp-monthly-hero-label">{{ translate(478) }}</span>
                                    <div class="jp-monthly-hero-value" id="monthly-payment">—</div>
                                </div>

                                <div class="jp-results-body">
                                    <div class="jp-result-row">
                                        <div class="jp-result-label">{{ translate(479) }}</div>
                                        <div class="jp-result-value" id="total-amount">—</div>
                                    </div>
                                    <div class="jp-result-row">
                                        <div class="jp-result-label">{{ translate(594) }}</div>
                                        <div class="jp-result-value" id="total-interest">—</div>
                                    </div>
                                    <div class="jp-result-row jp-result-row-highlight">
                                        <div class="jp-result-label">{{ translate(596) }}</div>
                                        <div class="jp-result-value" id="taeg">{{ $homeDisplayedTeagCalc }}</div>
                                    </div>
                                </div>

                                <div class="jp-amortization-section">
                                    <div class="jp-amortization-head">
                                        <h4>{{ translate(670) }}</h4>
                                        <span class="jp-amortization-count" id="amortization-count"></span>
                                    </div>
                                    <div class="jp-amortization-table-wrapper">
                                        <table class="jp-amortization-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ translate(666) }}</th>
                                                    <th>{{ translate(478) }}</th>
                                                    <th>{{ translate(667) }}</th>
                                                    <th>{{ translate(668) }}</th>
                                                    <th>{{ translate(669) }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="amortization-body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="jp-calculator-footer">
                        <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-calculator-btn" id="continue-to-form">
                            <span>{{ translate(642) }}</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
        </div>
    </div>
</section>
<section>
    @include('pages.robotique')
</section>

<style>
.jp-final-hero{
    position:relative;
    padding:90px 0 70px;
    background:url('{{ asset_img("slider/style1/h1-2.jpg") }}') center/cover no-repeat;
    overflow:hidden;
}

.jp-final-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(90deg, rgba(20,20,30,0.86) 0%, rgba(20,20,30,0.62) 42%, rgba(20,20,30,0.22) 100%);
}

.jp-final-content{
    position:relative;
    z-index:2;
    max-width:680px;
}

.jp-final-badge{
    display:inline-block;
    background:rgba(255,255,255,0.14);
    color:#fff;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    margin-bottom:15px;
}

.jp-final-title{
    color:#fff;
    font-size:48px;
    font-weight:800;
    line-height:1.08;
    margin-bottom:16px;
}

.jp-final-desc{
    color:rgba(255,255,255,0.92);
    font-size:16px;
    line-height:1.75;
    margin-bottom:26px;
    max-width:620px;
}

.jp-final-image{
    position:relative;
    z-index:2;
    text-align:right;
}

.jp-final-image img{
    width:100%;
    max-width:560px;
    border-radius:20px;
    box-shadow:0 18px 40px rgba(0,0,0,0.16);
}

.jp-loan-calculator{
    background:linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    padding:100px 0;
    border-bottom:1px solid #e5e7eb;
    overflow-x:clip;
}

.jp-loan-calculator-container{
    width:100%;
    max-width:100%;
}

.jp-loan-calculator-container,
.jp-calculator-wrapper,
.jp-calculator-grid,
.jp-calculator-left,
.jp-calculator-right,
.jp-form-group,
.jp-range-wrapper,
.jp-results-card,
.jp-amount-buttons,
.jp-duration-buttons,
.jp-amount-btn,
.jp-duration-btn{
    box-sizing:border-box;
}

.jp-calculator-wrapper{
    background:#ffffff;
    border:1px solid #e5e7eb;
    border-radius:24px;
    padding:56px;
    box-shadow:0 25px 60px rgba(15,23,42,0.1);
    max-width:1200px;
    width:100%;
    margin:0 auto;
}

.jp-calculator-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:56px;
    margin-bottom:48px;
    width:100%;
    min-width:0;
}

.jp-calculator-left,
.jp-calculator-right{
    min-width:0;
    width:100%;
}

.jp-calculator-header{
    display:flex;
    flex-direction:column;
    align-items:center;
    margin-bottom:48px;
}

.jp-calculator-icon{
    width:80px;
    height:80px;
    background:linear-gradient(135deg, #0B6B3A 0%, #1F8A4C 100%);
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    margin-bottom:24px;
    box-shadow:0 12px 30px rgba(11,107,58,0.3);
}

.jp-calculator-title{
    color:#0f172a;
    font-size:42px;
    font-weight:800;
    margin:0 0 16px;
    text-align:center;
}

.jp-calculator-desc{
    color:#64748b;
    font-size:18px;
    line-height:1.6;
    margin:0;
    text-align:center;
    max-width:600px;
}

.jp-calculator-left{
    padding-right:28px;
}

.jp-form-group{
    margin-bottom:32px;
}

.jp-form-label{
    display:block;
    color:#334155;
    font-size:16px;
    font-weight:700;
    margin-bottom:16px;
}

.jp-range-wrapper{
    position:relative;
    width:100%;
    min-width:0;
}

.jp-range-meta{
    display:flex;
    justify-content:space-between;
    gap:8px;
    margin-bottom:10px;
    font-size:13px;
    font-weight:600;
    color:#94a3b8;
}

.jp-range-meta span{
    min-width:0;
    flex:1 1 0;
}

.jp-range-meta span:last-child{
    text-align:right;
}

.jp-amount-buttons{
    display:grid;
    grid-template-columns:repeat(3, minmax(0, 1fr));
    gap:8px;
    margin-top:20px;
    width:100%;
    min-width:0;
}

.jp-amount-btn{
    min-height:44px;
    width:100%;
    max-width:100%;
    min-width:0;
    padding:10px 6px;
    background:#f8fafc;
    border:2px solid #e2e8f0;
    border-radius:8px;
    color:#475569;
    font-weight:600;
    font-size:13px;
    line-height:1.25;
    text-align:center;
    white-space:normal;
    overflow-wrap:anywhere;
    cursor:pointer;
    transition:all 0.2s ease;
}

.jp-amount-btn:hover{
    background:#e2e8f0;
    border-color:#cbd5e1;
}

.jp-amount-btn.active{
    background:#0B6B3A;
    border-color:#0B6B3A;
    color:#fff;
}

.jp-range-slider{
    width:100%;
    max-width:100%;
    height:10px;
    border-radius:6px;
    background:linear-gradient(to right, #0B6B3A 0%, #0B6B3A var(--range-progress, 0%), #e2e8f0 var(--range-progress, 0%), #e2e8f0 100%);
    outline:none;
    -webkit-appearance:none;
    appearance:none;
    cursor:pointer;
    display:block;
    margin:0;
}

.jp-range-slider::-webkit-slider-thumb{
    -webkit-appearance:none;
    appearance:none;
    width:28px;
    height:28px;
    border-radius:50%;
    background:#0B6B3A;
    cursor:pointer;
    box-shadow:0 6px 20px rgba(11,107,58,0.4);
    transition:transform 0.2s ease;
}

.jp-range-slider::-webkit-slider-thumb:hover{
    transform:scale(1.15);
}

.jp-range-slider::-moz-range-thumb{
    width:28px;
    height:28px;
    border-radius:50%;
    background:#0B6B3A;
    cursor:pointer;
    border:none;
    box-shadow:0 6px 20px rgba(11,107,58,0.4);
}

.jp-range-value{
    display:flex;
    align-items:center;
    gap:12px;
    margin-top:16px;
    font-size:28px;
    font-weight:800;
    color:#0f172a;
}

.jp-currency{
    color:#64748b;
    font-weight:600;
    font-size:20px;
}

.jp-duration-unit{
    color:#64748b;
    font-weight:600;
    font-size:18px;
}

.jp-duration-options{
    margin-top:32px;
}

.jp-duration-buttons{
    display:grid;
    grid-template-columns:repeat(3, minmax(0, 1fr));
    gap:8px;
    width:100%;
    min-width:0;
}

.jp-duration-btn{
    min-height:44px;
    width:100%;
    max-width:100%;
    min-width:0;
    padding:10px 6px;
    background:#f8fafc;
    border:2px solid #e2e8f0;
    border-radius:8px;
    color:#475569;
    font-weight:600;
    font-size:14px;
    line-height:1.25;
    text-align:center;
    white-space:normal;
    overflow-wrap:anywhere;
    cursor:pointer;
    transition:all 0.2s ease;
}

.jp-duration-btn:hover{
    background:#e2e8f0;
    border-color:#cbd5e1;
}

.jp-duration-btn.active{
    background:#0B6B3A;
    border-color:#0B6B3A;
    color:#fff;
}

.jp-calculator-right{
    padding-left:28px;
}

.jp-results-card{
    background:#ffffff;
    border:1px solid #e2e8f0;
    border-radius:20px;
    padding:40px;
    box-shadow:0 16px 40px rgba(15,23,42,0.08);
    color:#0f172a;
    width:100%;
    min-width:0;
}

.jp-results-header{
    margin-bottom:32px;
    min-width:0;
}

.jp-results-header h3{
    font-size:24px;
    font-weight:700;
    margin:0 0 8px;
    color:#0f172a;
    overflow-wrap:break-word;
}

.jp-results-header p{
    font-size:14px;
    color:#64748b;
    margin:0 0 16px;
    overflow-wrap:break-word;
}

.jp-results-chips{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
}

.jp-results-chip{
    display:inline-flex;
    align-items:center;
    padding:6px 12px;
    border-radius:999px;
    background:#f8fafc;
    border:1px solid #e2e8f0;
    color:#334155;
    font-size:13px;
    font-weight:600;
}

.jp-monthly-hero{
    text-align:center;
    padding:28px 20px;
    margin-bottom:24px;
    border-radius:16px;
    background:linear-gradient(180deg, #eef9f1 0%, #f4fbf6 100%);
    border:1px solid #bfe3cd;
}

.jp-monthly-hero-label{
    display:block;
    color:#64748b;
    font-size:14px;
    font-weight:600;
    margin-bottom:8px;
}

.jp-monthly-hero-value{
    color:#0B6B3A;
    font-size:42px;
    font-weight:800;
    line-height:1.1;
    margin-bottom:8px;
    transition:opacity 0.15s ease;
}

.jp-monthly-hero-value.is-updating{
    opacity:0.55;
}

.jp-monthly-hero-note{
    display:block;
    color:#16a34a;
    font-size:13px;
    font-weight:600;
}

.jp-results-body{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.jp-result-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 0;
    border-bottom:1px solid #e2e8f0;
}

.jp-result-row:last-child{
    border-bottom:none;
}

.jp-result-row .jp-result-label{
    color:#64748b;
    font-size:15px;
    font-weight:500;
}

.jp-result-row .jp-result-value{
    color:#0f172a;
    font-size:22px;
    font-weight:700;
}

.jp-result-row-highlight{
    background:#eef9f1;
    border-radius:12px;
    padding:20px;
    margin:0;
    border:1px solid #bfe3cd;
}

.jp-result-row-highlight .jp-result-label{
    color:#0A2E1C;
}

.jp-result-row-highlight .jp-result-value{
    color:#0B6B3A;
    font-size:26px;
}

.jp-amortization-section{
    margin-top:32px;
    padding-top:32px;
    border-top:1px solid #e2e8f0;
}

.jp-amortization-section h4{
    font-size:18px;
    font-weight:700;
    margin:0;
    color:#0f172a;
}

.jp-amortization-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin-bottom:16px;
}

.jp-amortization-count{
    color:#64748b;
    font-size:12px;
    font-weight:600;
}

.jp-amortization-table-wrapper{
    max-height:300px;
    overflow:auto;
    -webkit-overflow-scrolling:touch;
    border-radius:12px;
    background:#f8fafc;
    border:1px solid #e2e8f0;
}

.jp-amortization-table{
    width:100%;
    min-width:540px;
    border-collapse:collapse;
}

.jp-amortization-table thead{
    position:sticky;
    top:0;
    background:#f1f5f9;
    z-index:10;
}

.jp-amortization-table th{
    padding:12px 8px;
    text-align:left;
    font-size:12px;
    font-weight:600;
    color:#64748b;
    border-bottom:1px solid #e2e8f0;
}

.jp-amortization-table td{
    padding:10px 8px;
    font-size:13px;
    color:#334155;
    border-bottom:1px solid #e2e8f0;
}

.jp-amortization-table tr:last-child td{
    border-bottom:none;
}

.jp-amortization-table tr:hover{
    background:#ffffff;
}

.jp-calculator-footer{
    text-align:center;
}

.jp-calculator-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    background:linear-gradient(135deg, #0B6B3A 0%, #1F8A4C 100%);
    color:#fff;
    padding:20px 56px;
    border-radius:14px;
    font-weight:800;
    font-size:18px;
    text-decoration:none;
    transition:all 0.3s ease;
    box-shadow:0 16px 40px rgba(11,107,58,0.4);
}

.jp-calculator-btn:hover{
    background:linear-gradient(135deg, #0A2E1C 0%, #0B6B3A 100%);
    transform:translateY(-3px);
    box-shadow:0 20px 50px rgba(11,107,58,0.5);
}

@media(max-width:1024px){
    .jp-loan-calculator{
        padding:72px 0;
    }

    .jp-calculator-grid{
        grid-template-columns:1fr;
        gap:32px;
        margin-bottom:36px;
    }
    
    .jp-calculator-left{
        padding-right:0;
    }
    
    .jp-calculator-right{
        padding-left:0;
    }
}

@media(max-width:768px){
    .jp-loan-calculator{
        padding:48px 0;
    }

    .jp-loan-calculator-container{
        padding-left:16px;
        padding-right:16px;
    }

    .jp-calculator-wrapper{
        padding:24px 16px;
        border-radius:18px;
        box-shadow:0 12px 32px rgba(15,23,42,0.08);
    }

    .jp-calculator-header{
        margin-bottom:28px;
    }
    
    .jp-calculator-title{
        font-size:28px;
        line-height:1.15;
    }

    .jp-calculator-desc{
        font-size:15px;
        line-height:1.55;
    }
    
    .jp-calculator-icon{
        width:60px;
        height:60px;
        border-radius:16px;
        margin-bottom:18px;
    }

    .jp-calculator-icon svg{
        width:36px;
        height:36px;
    }

    .jp-form-group{
        margin-bottom:24px;
    }

    .jp-form-label{
        font-size:15px;
        margin-bottom:12px;
    }

    .jp-range-value{
        font-size:24px;
        gap:8px;
        margin-top:12px;
    }

    .jp-currency,
    .jp-duration-unit{
        font-size:16px;
    }

    .jp-range-meta{
        font-size:12px;
    }

    .jp-amount-buttons,
    .jp-duration-buttons{
        grid-template-columns:repeat(3, minmax(0, 1fr));
        gap:8px;
    }

    .jp-amount-btn,
    .jp-duration-btn{
        font-size:11px;
        padding:10px 4px;
        min-height:46px;
    }

    .jp-duration-options{
        margin-top:24px;
    }

    .jp-results-card{
        padding:22px 16px;
        border-radius:16px;
    }

    .jp-results-header{
        margin-bottom:20px;
    }

    .jp-results-header h3{
        font-size:20px;
    }

    .jp-results-header p{
        font-size:13px;
        margin-bottom:12px;
    }

    .jp-results-chips{
        gap:6px;
    }

    .jp-results-chip{
        font-size:12px;
        padding:5px 10px;
    }

    .jp-monthly-hero{
        padding:20px 14px;
        margin-bottom:18px;
        border-radius:14px;
    }

    .jp-monthly-hero-label{
        font-size:13px;
    }

    .jp-monthly-hero-value{
        font-size:32px;
    }

    .jp-results-body{
        gap:12px;
    }

    .jp-result-row{
        flex-direction:column;
        align-items:flex-start;
        gap:6px;
        padding:12px 0;
    }

    .jp-result-row .jp-result-label{
        font-size:14px;
    }

    .jp-result-row .jp-result-value{
        font-size:20px;
        width:100%;
    }

    .jp-result-row-highlight{
        padding:16px;
    }

    .jp-result-row-highlight .jp-result-value{
        font-size:22px;
    }

    .jp-amortization-section{
        margin-top:24px;
        padding-top:24px;
    }

    .jp-amortization-head{
        flex-direction:column;
        align-items:flex-start;
        gap:4px;
        margin-bottom:12px;
    }

    .jp-amortization-section h4{
        font-size:16px;
    }

    .jp-amortization-table-wrapper{
        max-height:260px;
        margin:0 -2px;
    }

    .jp-amortization-table{
        min-width:500px;
    }

    .jp-amortization-table th,
    .jp-amortization-table td{
        padding:9px 6px;
        font-size:11px;
        white-space:nowrap;
    }

    .jp-calculator-footer{
        margin-top:4px;
    }
    
    .jp-calculator-btn{
        width:100%;
        padding:16px 20px;
        font-size:16px;
        border-radius:12px;
    }
}

@media(max-width:480px){
    .jp-loan-calculator{
        padding:36px 0;
    }

    .jp-loan-calculator-container{
        padding-left:12px;
        padding-right:12px;
    }

    .jp-calculator-wrapper{
        padding:20px 12px;
        border-radius:16px;
    }

    .jp-calculator-title{
        font-size:24px;
    }

    .jp-calculator-desc{
        font-size:14px;
    }

    .jp-range-value{
        font-size:22px;
    }

    .jp-amount-buttons,
    .jp-duration-buttons{
        grid-template-columns:repeat(2, minmax(0, 1fr));
        gap:8px;
    }

    .jp-amount-btn,
    .jp-duration-btn{
        font-size:11px;
        min-height:44px;
        padding:9px 4px;
    }

    .jp-monthly-hero-value{
        font-size:28px;
    }

    .jp-result-row .jp-result-value{
        font-size:18px;
    }

    .jp-amortization-table{
        min-width:460px;
    }
}

.jp-financing-conditions{
    background:linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    padding:82px 0;
    border-bottom:1px solid #e5e7eb;
}

.jp-financing-conditions-shell{
    max-width:1060px;
    margin:0 auto;
}

.jp-financing-conditions-kicker{
    display:inline-flex;
    align-items:center;
    gap:8px;
    color:#0B6B3A;
    background:#eef9f1;
    border:1px solid #d9f2e3;
    border-radius:999px;
    font-size:13px;
    font-weight:800;
    padding:7px 12px;
    margin-bottom:14px;
}

.jp-financing-conditions-title{
    color:#0f172a;
    font-size:36px;
    line-height:1.15;
    font-weight:800;
    margin:0 0 14px;
}

.jp-financing-conditions-summary{
    color:#334155;
    font-size:17px;
    line-height:1.75;
    margin:0 0 28px;
    max-width:920px;
}

.jp-financing-conditions-summary span{
    display:inline;
    margin-right:0;
}

.jp-financing-conditions-summary strong{
    color:#0f172a;
    font-weight:800;
}

.jp-financing-conditions-card{
    background:#ffffff;
    border:1px solid #e5e7eb;
    border-radius:8px;
    padding:28px 30px;
    box-shadow:0 16px 40px rgba(15,23,42,0.07);
    max-width:860px;
}

.jp-financing-conditions-example{
    background:#ecfdf3;
    border:1px solid #bbf7d0;
    border-left:4px solid #16a34a;
    border-radius:8px;
    color:#14532d;
    font-size:16px;
    line-height:1.75;
    padding:18px 20px;
    margin-bottom:16px;
}

.jp-financing-conditions-fee{
    color:#374151;
    font-size:16px;
    line-height:1.7;
    margin:0 0 22px;
}

.jp-financing-conditions-fee strong{
    color:#0f172a;
}

.jp-financing-conditions-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    background:#0B6B3A;
    color:#fff;
    padding:14px 24px;
    border-radius:999px;
    font-weight:800;
    text-decoration:none;
    transition:.2s ease;
    box-shadow:0 12px 26px rgba(11,107,58,0.18);
}

.jp-financing-conditions-btn:hover{
    background:#0A2E1C;
    color:#fff;
    transform:translateY(-2px);
}

@media (max-width:991px){
    .jp-final-hero{
        padding:70px 0 55px;
    }

    .jp-final-title{
        font-size:38px;
    }

    .jp-final-desc{
        font-size:15px;
        line-height:1.7;
    }

    .jp-final-image{
        margin-top:28px;
        text-align:center;
    }

}

@media (max-width:768px){
    .jp-final-title{
        font-size:32px;
    }

    .jp-final-image img{
        max-width:100%;
    }

    .jp-financing-conditions{
        padding:48px 0;
    }

    .jp-financing-conditions-title{
        font-size:28px;
    }

    .jp-financing-conditions-summary{
        font-size:15px;
    }

    .jp-financing-conditions-card{
        padding:22px 18px;
    }

    .jp-financing-conditions-btn{
        width:100%;
        text-align:center;
    }
}
</style>

@php
    $homeDisplayedTeag = preg_replace('/\s*%$/', ' %', str_replace('.', ',', TEAG));
    $homeRateValue = str_replace(':rate', $homeDisplayedTeag, str_replacing(__('TRAD_597')));
@endphp

<section class="jp-financing-conditions">
    <div class="container">
        <div class="jp-financing-conditions-shell">
            <div>
                <span class="jp-financing-conditions-kicker">
                    <i class="fa fa-check-circle"></i>
                    {{ translate(591) }}
                </span>

                <p class="jp-financing-conditions-summary">
                    <span><strong>{{ translate(592) }} :</strong> {{ translate(593) }}</span>,
                    <span><strong>{{ translate(594) }} :</strong> {{ translate(595) }}</span>,
                    <span><strong>{{ translate(596) }}</strong> {{ $homeRateValue }}</span>.
                </p>
            </div>

            <div class="jp-financing-conditions-card">
                <div class="jp-financing-conditions-example">
                    {{ translate(598) }}
                </div>

                <a href="{{ routeWithLocale('site.obtain_financing') }}" class="jp-financing-conditions-btn">
                    {{ translate(204) }}
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="jp-trust-partner pt-120 pb-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="jp-trust-partner-shell">
            <div class="sec-title mb-40">
                <h2 class="title">{{ translate(690) }}</h2>
            </div>
            <div class="jp-trust-partner-content">
                <p class="desc">{{ translate(691) }}</p>
                <p class="desc">{{ translate(692) }}</p>
                <p class="desc">{{ translate(693) }}</p>
            </div>
            <div class="row mt-40">
                <div class="col-lg-6 md-mb-30">
                    <div class="jp-trust-card">
                        <h3>{{ translate(694) }}</h3>
                        <p>{{ translate(695) }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="jp-trust-card">
                        <h3>{{ translate(696) }}</h3>
                        <p>{{ translate(697) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.jp-trust-partner{
    background:#ffffff;
    border-top:1px solid #e5e7eb;
}

.jp-trust-partner-shell{
    max-width:980px;
    margin:0 auto;
}

.jp-trust-partner .title{
    font-size:34px;
    font-weight:800;
    color:#0f172a;
    line-height:1.2;
}

.jp-trust-partner-content .desc{
    color:#374151;
    font-size:16px;
    line-height:1.8;
    margin-bottom:16px;
}

.jp-trust-card{
    background:#f8fafc;
    border:1px solid #e5e7eb;
    border-radius:18px;
    padding:28px 30px;
    height:100%;
}

.jp-trust-card h3{
    font-size:22px;
    font-weight:800;
    color:#0B6B3A;
    margin-bottom:12px;
}

.jp-trust-card p{
    color:#374151;
    font-size:15px;
    line-height:1.75;
    margin:0;
}

@media (max-width:768px){
    .jp-trust-partner .title{
        font-size:28px;
    }
}
</style>

	<!-- About Choose Start -->
	<div class="rs-about about-style1 pt-120 pb-120 md-pb-80">
		<div class="container">
			<div class="row y-middle">
				<div class="col-lg-6 md-mb-50">
					<div class="images-part">
						<img class="js-tilt" src="{{ asset_img('about/style1/about.png') }}" alt="About">
					</div>
				</div>
				<div class="col-lg-6 pl-40 md-pl-15">
					<div class="sec-title mb-40 md-mb-25">
						<span class="sub-text">{{ translate(296) }}</span>
						<h2 class="title pb-25">{{ translate(298) }}</h2>
						<p class="desc mb-1">{{ translate(297) }}</p>
						<p class="desc">{{ translate(60) }}</p>
					</div>
					<div class="rs-addon-services">
						<div class="row hover-effect">
							<div class="col-lg-6 col-md-6 sm-mb-30">
								<div class="services-item active">
									<div class="services-wrap">
										<div class="services-icon">
											<img src="{{ asset_img('about/style1/icons/1.png') }}" alt="">
										</div>
										<div class="services-content">
											<h3 class="title">{{ translate(262) }}</h3>
											<p class="services-txt">{{ translate(263) }}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="services-item">
									<div class="services-wrap">
										<div class="services-icon">
											<img src="{{ asset_img('about/style1/icons/2.png') }}" alt="">
										</div>
										<div class="services-content">
											<h3 class="title">{{ translate(266) }}</h3>
											<p class="services-txt">{{ translate(267) }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Choose End -->

	<!-- Why Choose Start -->
	<div class="rs-choose choose-style1 pt-120 pb-120 md-pt-80 md-pb-80">
		<div class="container">
			<div class="row y-middle">
				<div class="col-lg-5 md-mb-50">
					<div class="rs-videos">
	                    <div class="images-video">
	                        <img class="js-tilt" src="{{ asset_img('choose/style1/choose-video.jpg') }}" alt="images">
	                    </div>
	                </div>
				</div>
				<div class="col-lg-7 pl-50 md-pl-15 pr-36 md-pr-15">
					<div class="sec-title mb-30">
						<span class="sub-text">{{ translate(233) }}</span>
						<h2 class="title">{!! translate(293) !!}</h2>
					</div>
					<div class="services-item mb-20">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/1.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(234) }}</h3>
							<p class="services-txt">{{ translate(236) }}</p>
						</div>
					</div>
					<div class="services-item mb-20">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/2.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(237) }}</h3>
							<p class="services-txt">{{ translate(238) }}</p>
						</div>
					</div>
					<div class="services-item">
						<div class="services-icon">
							<img src="{{ asset_img('choose/style1/icons/3.png') }}" alt="Images">
						</div>
						<div class="services-content">
							<h3 class="title">{{ translate(239) }}</h3>
							<p class="services-txt">{{ translate(241) }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Why Choose End -->

	<!-- Cta Start -->
	<div class="rs-cta pt-116 pb-115 bg3 md-pt-76 md-pb-75">
		<div class="container">
			<div class="sec-title text-center ">
				<h2 class="title title2">{!! translate(291) !!}</h2>
	            <div class="btn-part mt-45 md-mt-30">
	               	<a class="readon cta-started" href="{{ routeWithLocale('site.obtain_financing') }}">{{ translate(303) }}</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Cta End -->

	<!-- Faq Start -->
	<div class="rs-faq faq-style1 pt-120 pb-120 md-pt-80 md-pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pr-55 md-pr-15 md-mb-50">
					<div class="sec-title mb-45">
						<span class="sub-text">{{ translate(80) }}</span>
						<h2 class="title">{{ translate(81) }}</h2>
					</div>
					<div class="row">
						<div class="col-lg-6 pr-55 md-pr-15 md-mb-50">
							<div class="faq-content">
			                   <div id="accordion" class="accordion">
			                   		
			                   		@foreach (FaqsListing(1, 5) as $fq_index => $faq)
			                   			<div class="card">
			                   			    <div class="card-header py-2">
			                   			        <a class="card-link{{ ($fq_index == 0) ? '' : ' collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $fq_index }}" aria-expanded="{{ ($fq_index == 0) ? 'true' : 'false' }}">{{ translate($faq[0]) }}</a>
			                   			    </div>
			                   			    <div id="collapse-{{ $fq_index }}" class="collapse{{ ($fq_index == 0) ? ' show' : '' }}" data-bs-parent="#accordion">
			                   			        <div class="card-body">{!! translate($faq[1]) !!}</div>
			                   			    </div>
			                   			</div>
			                   		@endforeach

			                   </div>
			               </div>
						</div>
						<div class="col-lg-6">
							<div class="faq-content">
			                   <div id="accordi6on" class="accordion">
			                   		
			                   		@foreach (FaqsListing(6, 5) as $fq_index => $faq)
				                   		@php
				                   			$fq_index = $fq_index + 100
				                   		@endphp
			                   			<div class="card">
			                   			    <div class="card-header py-2">
			                   			        <a class="card-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $fq_index }}" aria-expanded="false">{{ translate($faq[0]) }}</a>
			                   			    </div>
			                   			    <div id="collapse-{{ $fq_index }}" class="collapse" data-bs-parent="#accordion">
			                   			        <div class="card-body">{!! translate($faq[1]) !!}</div>
			                   			    </div>
			                   			</div>
			                   		@endforeach

			                   </div>
			               </div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Faq End -->

	<!-- Blog Section Start -->
	<div id="rs-blog" class="rs-blog blog-main-home pt-120 pb-115 md-pt-80 md-pb-75">
	    <div class="container">  
	        <div class="sec-title text-center mb-45">
	         	<span class="sub-text">{{ translate(113) }}</span>
	         	<h2 class="title">{{ translate(265) }}</h2>
	        </div>
	        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
	            
	            @foreach (loanOffersLists() as $slug => $loan)
	              	<div class="blog-item">
	              	    <div class="image-wrap">
	              	        <a href="{{ routeWithLocale('site.loan_offers', $slug) }}">
	              	        	<img src="{{ asset_img('loans/'. $slug .'.jpg') }}" alt="">
	              	        </a>
	              	        <div class="date">
	              	            <i class="fi fi-rr-time-add"></i>
	              	            {{ translate(113) }}
	              	        </div>
	              	    </div>
	              	    <div class="blog-content">
	              	        <h3 class="blog-title">
	              	        	<a href="{{ routeWithLocale('site.loan_offers', $slug) }}">{{ translate($loan[0]) }}</a>
	              	        </h3>
	              	        <div class="desc">{{ translate($loan[1][0], 100) }}</div>
	              	        <div class="blog-button">
	              	        	<a href="{{ routeWithLocale('site.obtain_financing', $slug) }}">{{ translate(227) }}</a>
	              	        </div>
	              	    </div>
	              	</div>
	            @endforeach

	        </div>
	    </div>
	</div>
	<!-- Blog Section End -->

	<!-- Partner Start -->
	<x-partners></x-partners>
	<!-- Partner End -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loanAmountSlider = document.getElementById('loan-amount');
    const loanDurationSlider = document.getElementById('loan-duration');
    const loanAmountDisplay = document.getElementById('loan-amount-display');
    const loanDurationDisplay = document.getElementById('loan-duration-display');
    const monthlyPaymentDisplay = document.getElementById('monthly-payment');
    const totalAmountDisplay = document.getElementById('total-amount');
    const totalInterestDisplay = document.getElementById('total-interest');
    const summaryAmount = document.getElementById('summary-amount');
    const summaryDuration = document.getElementById('summary-duration');
    const amortizationBody = document.getElementById('amortization-body');
    const amortizationCount = document.getElementById('amortization-count');
    const durationButtons = document.querySelectorAll('.jp-duration-btn');
    const amountButtons = document.querySelectorAll('.jp-amount-btn');

    const config = {
        currencyCode: @json($homeLoanCurrency),
        currencySymbol: @json(loan_currency_symbol_for_code($homeLoanCurrency)),
        numberLocale: @json($homeLoanNumberLocale),
        teag: {{ floatval(str_replace(',', '.', str_replace('%', '', TEAG))) }},
        minAmount: {{ $homeLoanMin }},
        maxAmount: {{ $homeLoanMax }},
        monthsLabel: @json(translate(471)),
        amortizationLabel: @json(translate(670)),
    };

    function formatMoney(amount) {
        const value = Math.round(amount * 100) / 100;
        const formatted = value.toLocaleString(config.numberLocale, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 2,
        });

        if (config.currencyCode === 'SEK' || config.currencyCode === 'NOK' || config.currencyCode === 'DKK') {
            return formatted + ' kr';
        }

        return formatted + ' ' + config.currencySymbol;
    }

    function updateRangeProgress(slider) {
        const min = parseFloat(slider.min);
        const max = parseFloat(slider.max);
        const value = parseFloat(slider.value);
        const progress = max === min ? 0 : ((value - min) / (max - min)) * 100;
        slider.style.setProperty('--range-progress', progress + '%');
    }

    function syncActiveDurationButton(duration) {
        durationButtons.forEach(function(btn) {
            btn.classList.toggle('active', parseInt(btn.dataset.duration, 10) === duration);
        });
    }

    function syncActiveAmountButton(amount) {
        amountButtons.forEach(function(btn) {
            btn.classList.toggle('active', parseInt(btn.dataset.amount, 10) === amount);
        });
    }

    function snapAmountToStep(amount) {
        const step = 1000;
        const snapped = Math.round(amount / step) * step;
        return Math.min(config.maxAmount, Math.max(config.minAmount, snapped));
    }

    function generateAmortizationTable(amount, duration, mensualite, tauxMensuel) {
        let balance = amount;
        let html = '';
        let totalInterest = 0;

        for (let i = 1; i <= duration; i++) {
            const interest = balance * tauxMensuel;
            const principal = mensualite - interest;
            balance = Math.max(0, balance - principal);
            totalInterest += interest;

            html += '<tr>' +
                '<td>' + i + '</td>' +
                '<td>' + formatMoney(mensualite) + '</td>' +
                '<td>' + formatMoney(principal) + '</td>' +
                '<td>' + formatMoney(interest) + '</td>' +
                '<td>' + formatMoney(balance) + '</td>' +
            '</tr>';
        }

        amortizationBody.innerHTML = html;
        amortizationCount.textContent = duration + ' ' + config.monthsLabel;

        return totalInterest;
    }

    function calculateLoan() {
        const amount = snapAmountToStep(parseFloat(loanAmountSlider.value));
        const duration = parseInt(loanDurationSlider.value, 10);
        const tauxMensuel = config.teag / 12 / 100;

        loanAmountSlider.value = amount;

        let mensualite;
        if (tauxMensuel > 0) {
            mensualite = amount * (tauxMensuel / (1 - Math.pow(1 + tauxMensuel, -duration)));
        } else {
            mensualite = amount / duration;
        }

        const montantTotal = mensualite * duration;
        const totalInterest = generateAmortizationTable(amount, duration, mensualite, tauxMensuel);

        loanAmountDisplay.textContent = amount.toLocaleString(config.numberLocale);
        loanDurationDisplay.textContent = duration;
        summaryAmount.textContent = formatMoney(amount);
        summaryDuration.textContent = duration + ' ' + config.monthsLabel;

        monthlyPaymentDisplay.classList.add('is-updating');
        window.requestAnimationFrame(function() {
            monthlyPaymentDisplay.textContent = formatMoney(mensualite);
            totalAmountDisplay.textContent = formatMoney(montantTotal);
            totalInterestDisplay.textContent = formatMoney(totalInterest);
            monthlyPaymentDisplay.classList.remove('is-updating');
        });

        updateRangeProgress(loanAmountSlider);
        updateRangeProgress(loanDurationSlider);
        syncActiveDurationButton(duration);
        syncActiveAmountButton(amount);
    }

    loanAmountSlider.addEventListener('input', calculateLoan);
    loanDurationSlider.addEventListener('input', calculateLoan);

    durationButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            loanDurationSlider.value = parseInt(this.dataset.duration, 10);
            calculateLoan();
        });
    });

    amountButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            loanAmountSlider.value = parseInt(this.dataset.amount, 10);
            calculateLoan();
        });
    });

    const continueBtn = document.getElementById('continue-to-form');
    if (continueBtn) {
        continueBtn.addEventListener('click', function() {
            const url = new URL(this.href);
            url.searchParams.set('amount', loanAmountSlider.value);
            url.searchParams.set('duration', loanDurationSlider.value);
            this.href = url.toString();
        });
    }

    calculateLoan();
});
</script>
@endpush

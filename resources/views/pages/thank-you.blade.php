@extends('layouts.default')

@section('content')
    <div class="rs-contact contact-style3 pt-60 pb-60 md-pt-50 md-pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div style="
                        background:linear-gradient(180deg,#ffffff 0%,#fcfcfd 100%);
                        border-radius:26px;
                        padding:44px 28px;
                        text-align:center;
                        box-shadow:0 16px 40px rgba(15,23,42,0.06);
                        border:1px solid #edf0f3;
                        max-width:820px;
                        margin:0 auto;
                        position:relative;
                        overflow:hidden;
                    ">

                        <div style="
                            position:absolute;
                            top:0;
                            left:0;
                            right:0;
                            height:5px;
                            background:linear-gradient(90deg,#16a34a 0%,#22c55e 100%);
                        "></div>

                        <div style="
                            width:74px;
                            height:74px;
                            margin:0 auto 18px;
                            border-radius:50%;
                            background:radial-gradient(circle at 30% 30%,#ecfdf3 0%,#dcfce7 70%);
                            color:#16a34a;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:34px;
                            font-weight:700;
                        ">
                            ✓
                        </div>

                        <h1 style="
                            font-size:34px;
                            line-height:1.2;
                            font-weight:800;
                            color:#0f172a;
                            margin:0 0 12px;
                        ">
                            @if(session('documents_completed'))
                                {{ translate(652) }}
                            @else
                                {{ translate(614) }}
                            @endif
                        </h1>

                        <p style="
                            font-size:17px;
                            line-height:1.7;
                            color:#475569;
                            margin:0 0 24px;
                        ">
                            @if(session('documents_completed'))
                                {{ translate(649) }}
                            @else
                                {{ translate(615) }}
                            @endif
                        </p>

                        <p style="
                            font-size:15px;
                            color:#94a3b8;
                            margin:0;
                        ">
                            {{ translate(496) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    gtag('event', 'conversion', {
        'send_to': 'AW-18330475088/VJfkCJSSz-IcENC006RE'
    });
});
</script>
@endpush
@push('scripts')
<script>
window.addEventListener('load', function () {
    console.log('Conversion Google Ads envoyée');

    gtag('event', 'conversion', {
        'send_to': 'AW-18330475088/VJfkCJSSz-IcENC006RE'
    });
});
</script>
@endpush
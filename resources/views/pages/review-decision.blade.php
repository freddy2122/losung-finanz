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
                    ">
                        @if ($success && $decision === 'approve')
                            <h1 style="font-size:30px;font-weight:800;color:#0f172a;margin:0 0 12px;">{{ translate(721) }}</h1>
                            <p style="font-size:16px;line-height:1.6;color:#475569;margin:0;">{{ translate(722) }}</p>
                        @elseif ($success && $decision === 'reject')
                            <h1 style="font-size:30px;font-weight:800;color:#0f172a;margin:0 0 12px;">{{ translate(723) }}</h1>
                            <p style="font-size:16px;line-height:1.6;color:#475569;margin:0;">{{ translate(724) }}</p>
                        @else
                            <h1 style="font-size:30px;font-weight:800;color:#0f172a;margin:0 0 12px;">{{ translate(725) }}</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

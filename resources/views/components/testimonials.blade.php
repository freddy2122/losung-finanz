@php
    $testimonials = \App\Models\Review::approved(9);
@endphp

<div class="rs-testimonial testimonial-main-home pt-120 pb-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="sec-title text-center mb-45">
            <span class="sub-text">{{ translate(84) }}</span>
            <h2 class="title">{{ translate(709) }}</h2>
            <p class="mt-15">{{ translate(710) }}</p>
        </div>

        @if (count($testimonials))
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="6000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
                @foreach ($testimonials as $testimonial)
                    <div class="jp-testimonial-item" style="background:#fff;border:1px solid #edf0f3;border-radius:16px;padding:30px;margin:0 10px 10px;box-shadow:0 10px 30px rgba(15,23,42,0.05);height:calc(100% - 10px);">
                        <div style="color:#f59e0b;font-size:18px;margin-bottom:14px;letter-spacing:2px;">
                            {{ str_repeat('★', (int) ($testimonial['rating'] ?? 0)) }}{{ str_repeat('☆', 5 - (int) ($testimonial['rating'] ?? 0)) }}
                        </div>
                        <p style="color:#374151;font-size:15px;line-height:1.7;margin-bottom:18px;">
                            &ldquo;{{ $testimonial['message'] ?? '' }}&rdquo;
                        </p>
                        <div style="font-weight:700;color:#0f172a;">{{ $testimonial['name'] ?? '' }}</div>
                        <div style="font-size:12px;color:#94a3b8;margin-top:2px;">
                            <i class="fa fa-check-circle" style="color:#16a34a;"></i>
                            {{ translate(713) }}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">{{ translate(712) }}</p>
        @endif

        <div class="text-center mt-40">
            <a class="readon cta-started" href="{{ routeWithLocale('site.testimonials') }}">{{ translate(711) }}</a>
        </div>
    </div>
</div>

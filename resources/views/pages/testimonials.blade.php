@extends('layouts.default')

@section('content')
    <!-- Banner Start -->
    <x-breadcrumb></x-breadcrumb>
    <!-- Banner End -->

    <!-- Review Form Start -->
    <div class="rs-contact contact-style3 pt-120 pb-120 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-title text-center mb-45">
                        <h2 class="title">{{ translate(701) }}</h2>
                        <p class="mt-15">{!! translate(702) !!}</p>
                    </div>

                    <div class="contact-wrap">
                        <x-alert></x-alert>

                        <form id="review-form" method="post" action="{{ routeWithLocale('site.testimonials.post') }}">
                            @csrf

                            <div class="form-group mb-30 text-center">
                                <label class="form-label">{{ translate(704) }}</label>
                                <div class="jp-star-rating">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="jp-star-{{ $i }}" name="review[rating]" value="{{ $i }}" {{ old('review.rating') == $i ? 'checked' : '' }}>
                                        <label for="jp-star-{{ $i }}" title="{{ $i }}/5"><i class="fa fa-star"></i></label>
                                    @endfor
                                </div>
                            </div>

                            <div class="mb-25">
                                <x-form-input label="{{ translate(703) }}" name="review[name]" value="{{ old('review.name', '') }}" />
                            </div>

                            <div class="mb-30">
                                <x-form-textarea label="{{ translate(705) }}" placeholder="{{ translate(706) }}" name="review[message]" value="{{ old('review.message', '') }}" />
                            </div>

                            <div class="btn-part text-center">
                                <div class="form-group mb-0">
                                    <input class="readon submit" type="submit" value="{{ translate(707) }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Review Form End -->

    <style>
    .jp-star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        gap: 8px;
        font-size: 32px;
        margin-top: 10px;
    }
    .jp-star-rating input {
        display: none;
    }
    .jp-star-rating label {
        color: #d1d5db;
        cursor: pointer;
        transition: color .2s;
    }
    .jp-star-rating input:checked ~ label,
    .jp-star-rating label:hover,
    .jp-star-rating label:hover ~ label {
        color: #f59e0b;
    }
    </style>
@endsection

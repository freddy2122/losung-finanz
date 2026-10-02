@extends('layouts.default')

@section('content')
	
	<!-- Banner Start -->
	<x-breadcrumb></x-breadcrumb>
	<!-- Banner End -->

	@if ( $type )
		<!-- Services Single Start -->
		<div class="rs-services-single pt-120 pb-120 md-pt-80 md-pb-80">
		   <div class="container">
		        <div class="row">
		            <div class="col-lg-8 md-mb-50">
		                <div class="services-img mb-35">
		                    <img style="width: 100%" src="{{ asset_img('assurances/' . $type . '.jpg') }}" alt="">
		                </div>
		                <div class="services-title pb-24">
		                    <h2 class="title">{{ translate($records[0]) }}</h2>
		                </div>
		                @foreach ($records[1] as $record)
		                	<p class="desc-part pb-15">{{ translate($record) }}</p>
		                @endforeach
		            </div>
		        </div> 
		   </div> 
		</div>
		<!-- Services Single End -->
	@else
		<!-- Services Section Start -->
		<div class="rs-services services-main-home services-modify2 pt-120 pb-120 md-pt-80 md-pb-80">
			<div class="container">
				<div class="row">

					@foreach ($records as $uri => $record)
						<a href="{{ routeWithLocale('site.assurances', $uri) }}" class="col-lg-4 col-md-6 mb-20">
							<div class="services-item">
								<div class="services-wrap">
									<div class="services-icon">
										<img class="main-img" src="{{ asset_img('services/main-home/home2/1.png') }}" alt="Services">
									</div>
									<div class="services-content">
										<h3 class="title">{{ translate($record[0]) }}</h3>
										<p class="services-txt">{{ translate($record[1][0], 100) }}</p>
									</div>
								</div>
							</div>
						</a>
					@endforeach

				</div>
			</div>
		</div>
		<!-- Services Section End -->
	@endif

	<!-- Cta Start -->
	<x-rs-cta></x-rs-cta>
	<!-- Cta End -->
@endsection
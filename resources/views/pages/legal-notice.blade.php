@extends('layouts.default')

@section('content')
	<!-- Banner Start -->
	<x-breadcrumb></x-breadcrumb>
	<!-- Banner End -->	
	
	<!-- Contact Section Start -->
	<div class="rs-contact contact-style3">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12 my-5">
	               <div class="contact-box">
	                    {!! get_page_contents('legal-notice') !!}
	               </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Contact Section Start -->

	<!-- Cta Start -->
	<x-rs-cta></x-rs-cta>
	<!-- Cta End -->
@endsection

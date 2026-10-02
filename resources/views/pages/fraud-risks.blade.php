@extends('layouts.default')

@section('content')
	<x-breadcrumb></x-breadcrumb>

	<div class="rs-contact contact-style3">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12 my-5">
	               <div class="contact-box">
	                    {!! get_page_contents('fraud-risks') !!}
	               </div>
	            </div>
	        </div>
	    </div>
	</div>

	<x-rs-cta></x-rs-cta>
@endsection

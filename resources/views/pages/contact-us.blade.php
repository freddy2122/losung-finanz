@extends('layouts.default')

@section('content')
	<!-- Banner Start -->
	<x-breadcrumb></x-breadcrumb>
	<!-- Banner End -->

	
	
	<!-- Contact Section Start -->
	<div class="rs-contact contact-style3 pt-120 md-pt-80">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-4 md-mb-60">
	               <div class="contact-box">
	                    <div class="sec-title mb-45 md-mb-30">
	                        <span class="title">{{ translate(266) }}</span><br><br>
	                        <p class="title0">{{ translate(251) }}</p>
	                    </div>
	                   <div class="address-box mb-25">
	                       <div class="address-icon">
	                           <i class="fa fa-phone"></i>
	                       </div>
	                       <div class="address-text">
	                           <span class="label">{{ translate(270) }}:</span>
	                           <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
	                       </div>
	                   </div>
	                   <div class="address-box">
	                       <div class="address-icon">
	                           <i class="fa fa-map-marker"></i>
	                       </div>
	                       <div class="address-text">
	                           <span class="label">{{ translate(272) }}:</span>
	                           <div class="desc">{!! SITE_ADDRESS !!}</div>
	                       </div>
	                   </div>
					
	               </div>
	            </div> 
	            <div class="col-lg-8 pl-70 md-pl-15">
                    <div class="contact-wrap">
                    	<x-alert only="success"></x-alert>
                        <form id="contact-form" method="post" action="{{ routeWithLocale('site.contact_us.post') }}">
                        	@csrf
                        	
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input label="{{ translate(107) }}" name="contact.name" />
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input type="email" label="{{ translate(108) }}" name="contact.email" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-25">
                                    	<x-form-input type="text" label="{{ translate(109) }}" name="contact.subject" />
                                    </div>
                                    <div class="col-lg-12 mb-30">
                                    	<x-form-textarea label="{{ translate(110) }}" name="contact.message" />
                                    </div>
                                </div>
                                <div class="btn-part">                                            
                                    <div class="form-group mb-0">
                                        <input class="readon submit" type="submit" value="{{ translate(111) }}">
                                    </div>
                                </div> 
                            </fieldset>
                        </form> 
                    </div>
	            </div>
	        </div>
	    </div>
	    <div class="map-canvas pt-120 md-pt-80">
	    	<x-google-maps />
	    </div> 
	</div>
	<!-- Contact Section Start -->

	<!-- Cta Start -->
	<x-rs-cta></x-rs-cta>
	<!-- Cta End -->
@endsection
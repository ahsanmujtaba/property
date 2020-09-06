{{--
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

@section('search')
	@parent
	@include('pages.inc.contact-intro')
@endsection

@section('content')
	@include('common.spacer')
	<!-- Breadcrumb -->
<div class="breadcrumb-area section" style="background-image: url({{url('dist/assets/images/bg/breadcrumb.jpg')}})">
    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>Contact us</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->
	<div class="main-container">
		<div class="container">
			<div class="row clearfix">
				
				@if (isset($errors) and $errors->any())
					<div class="col-xl-12 pt-30">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><strong>{{ t('Oops ! An error has occurred. Please correct the red fields in the form') }}</strong></h5>
							<ul class="list list-check">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

				@if (Session::has('flash_notification'))
					<div class="col-xl-12 pt-30">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif
				
				<!--<div class="col-md-12">-->
				<!--	<div class="contact-form">-->
				<!--		<h5 class="list-title gray mt-0">-->
				<!--			<strong>{{ t('Contact Us') }}</strong>-->
				<!--		</h5>-->

				<!--		<form class="form-horizontal" method="post" action="{{ lurl(trans('routes.contact')) }}">-->
				<!--			{!! csrf_field() !!}-->
				<!--			<fieldset>-->
				<!--				<div class="row">-->
				<!--					<div class="col-md-6">-->
				<!--						<?php $firstNameError = (isset($errors) and $errors->has('first_name')) ? ' is-invalid' : ''; ?>-->
				<!--						<div class="form-group required">-->
				<!--							<input id="first_name" name="first_name" type="text" placeholder="{{ t('First Name') }}"-->
				<!--								   class="form-control{{ $firstNameError }}" value="{{ old('first_name') }}">-->
				<!--						</div>-->
				<!--					</div>-->

				<!--					<div class="col-md-6">-->
				<!--						<?php $lastNameError = (isset($errors) and $errors->has('last_name')) ? ' is-invalid' : ''; ?>-->
				<!--						<div class="form-group required">-->
				<!--							<input id="last_name" name="last_name" type="text" placeholder="{{ t('Last Name') }}"-->
				<!--								   class="form-control{{ $lastNameError }}" value="{{ old('last_name') }}">-->
				<!--						</div>-->
				<!--					</div>-->

				<!--					<div class="col-md-6">-->
				<!--						<?php $companyNameError = (isset($errors) and $errors->has('company_name')) ? ' is-invalid' : ''; ?>-->
				<!--						<div class="form-group required">-->
				<!--							<input id="company_name" name="company_name" type="text" placeholder="{{ t('Company Name') }}"-->
				<!--								   class="form-control{{ $companyNameError }}" value="{{ old('company_name') }}">-->
				<!--						</div>-->
				<!--					</div>-->

				<!--					<div class="col-md-6">-->
				<!--						<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>-->
				<!--						<div class="form-group required">-->
				<!--							<input id="email" name="email" type="text" placeholder="{{ t('Email Address') }}" class="form-control{{ $emailError }}"-->
				<!--								   value="{{ old('email') }}">-->
				<!--						</div>-->
				<!--					</div>-->

				<!--					<div class="col-md-12">-->
				<!--						<?php $messageError = (isset($errors) and $errors->has('message')) ? ' is-invalid' : ''; ?>-->
				<!--						<div class="form-group required">-->
				<!--							<textarea class="form-control{{ $messageError }}" id="message" name="message" placeholder="{{ t('Message') }}"-->
				<!--									  rows="7">{{ old('message') }}</textarea>-->
				<!--						</div>-->
										
				<!--						@include('layouts.inc.tools.recaptcha')-->

				<!--						<div class="form-group">-->
				<!--							<button type="submit" class="btn btn-primary btn-lg">{{ t('Submit') }}</button>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--			</fieldset>-->
				<!--		</form>-->
				<!--	</div>-->
				<!--</div>-->
				
				
 
   
<!-- Our Agents Section Start -->    
<div class="contact-section section pt-90 pt-md-90 pt-sm-70 pt-xs-60 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-us-wrap">
                    <div class="contact-title pb-30">
                        <h4>GET IN <span>TOUCH</span></h4>
                        <p>Ortiz is the best theme for  elit, sed do eiusmod tempor dolor sit ame  tse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi </p>
                    </div>
                    
                    <div class="contact-info">
                        <ul>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-placeholder"></i> 
                                    <p>256, 1st AVE, Manchester <br>125 , Noth England</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-call"></i> 
                                    <p>
                                        <span>Telephone : <a href="#"> +88 (012) 356 958 45</a></span>
                                        <span>Telephone : <a href="#"> +88 (012) 356 958 45</a></span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-earth"></i>
                                    <p>
                                        <span>Email : <a href="#">info@example.com</a></span>
                                        <span>Web : <a href="#">www.example.com</a></span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-us-wrap">
                    <h4>Leave a Message</h4>
                       
                     <div class="contact-form">
                        <form  method="post" action="{{ lurl(trans('routes.contact')) }}">
                            <div class="row row-10">
                                <div class="col-md-6">
										<?php $firstNameError = (isset($errors) and $errors->has('first_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="first_name" name="first_name" type="text" placeholder="{{ t('First Name') }}"
												   class="{{ $firstNameError }}" value="{{ old('first_name') }}">
										</div>
									</div>

									<div class="col-md-6">
										<?php $lastNameError = (isset($errors) and $errors->has('last_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="last_name" name="last_name" type="text" placeholder="{{ t('Last Name') }}"
												   class="{{ $lastNameError }}" value="{{ old('last_name') }}">
										</div>
									</div>

									<div class="col-md-6">
										<?php $companyNameError = (isset($errors) and $errors->has('company_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="company_name" name="company_name" type="text" placeholder="{{ t('Company Name') }}"
												   class="{{ $companyNameError }}" value="{{ old('company_name') }}">
										</div>
									</div>
								
			    					<div class="col-md-6">
										<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="email" name="email" type="text" placeholder="{{ t('Email Address') }}" class="{{ $emailError }}"
												   value="{{ old('email') }}">
										</div>
									</div>
                                
                                
                                <div class="col-12 mb-30">
                                    <?php $messageError = (isset($errors) and $errors->has('message')) ? ' is-invalid' : ''; ?>
				
				                    <textarea class="{{ $messageError }}" id="message" name="message" placeholder="{{ t('Message') }}" rows="7">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12"><button class="btn send-btn btn-circle">Send</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
				
			</div>
		</div>
	</div>
@endsection

@section('after_scripts')
	<script src="{{ url('assets/js/form-validation.js') }}"></script>
@endsection

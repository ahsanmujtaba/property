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
    @include('pages.inc.page-intro')
@endsection

@section('content')
	@include('common.spacer')
<!-- Breadcrumb -->
<div class="breadcrumb-area section" style="background-image: url({{url('dist/assets/images/bg/breadcrumb.jpg')}})">
    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>{{ $page->title }}</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $page->name }}</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->

	<!--<div class="main-container inner-page">-->
	<!--	<div class="container">-->
	<!--		<div class="section-content">-->
	<!--			<div class="row">-->
                    
                    <!--@if (empty($page->picture))-->
                    <!--    <h1 class="text-center title-1" style="color: {!! $page->name_color !!};"><strong>{{ $page->name }}</strong></h1>-->
                    <!--    <hr class="center-block small mt-0" style="background-color: {!! $page->name_color !!};">-->
                    <!--@endif-->
                    
					<!--<div class="col-md-12 page-content">-->
					<!--	<div class="inner-box relative">-->
					<!--		<div class="row">-->
					<!--			<div class="col-sm-12 page-content">-->
     <!--                               @if (empty($page->picture))-->
					<!--				    <h3 class="text-center" style="color: {!! $page->title_color !!};">{{ $page->title }}</h3>-->
     <!--                               @endif-->
					<!--				<div class="text-content text-left from-wysiwyg">-->
					<!--					{!! $page->content !!}-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

	<!--			</div>-->

				

	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	
	<div class="blog-grids-area pt-80 pt-md-60 pt-sm-40 pt-xs-30 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 order-lg-1 order-1">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-details-warpper">
                                <div class="details-image mt-30">
                                    <img src="assets/images/blog/details.jpg" alt="">
                                </div>
                                <div class="details-contents-wrap">
                                    
                                    <h3 class='text-center'>
                                    @if (empty($page->picture))
                                        {{ $page->title }}
                                    @endif
                                    </h3>
                                    
                                    {!! $page->content !!}
                                    
                                    @include('layouts.inc.social.horizontal')
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--// Blog Grids Area -->
@endsection

@section('info')
@endsection

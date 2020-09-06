@if (isset($countPosts) and isset($countUsers) and isset($countCities))
@include('home.inc.spacer')
<!--<div class="container">-->
<!--	<div class="page-info page-info-lite rounded">-->
<!--		<div class="text-center section-promo">-->
<!--			<div class="row">-->
	
<!--				@if (isset($countPosts))-->
<!--				<div class="col-sm-4 col-xs-6 col-xxs-12">-->
<!--					<div class="iconbox-wrap">-->
<!--						<div class="iconbox">-->
<!--							<div class="iconbox-wrap-icon">-->
<!--								<i class="icon icon-docs"></i>-->
<!--							</div>-->
<!--							<div class="iconbox-wrap-content">-->
<!--								<h5><span>{{ $countPosts }}</span></h5>-->
<!--								<div class="iconbox-wrap-text">{{ t('Free ads') }}</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				@endif-->
	
<!--				@if (isset($countUsers))-->
<!--				<div class="col-sm-4 col-xs-6 col-xxs-12">-->
<!--					<div class="iconbox-wrap">-->
<!--						<div class="iconbox">-->
<!--							<div class="iconbox-wrap-icon">-->
<!--								<i class="icon icon-group"></i>-->
<!--							</div>-->
<!--							<div class="iconbox-wrap-content">-->
<!--								<h5><span>{{ $countUsers }}</span></h5>-->
<!--								<div class="iconbox-wrap-text">{{ t('Trusted Sellers') }}</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				@endif-->
	
<!--				@if (isset($countCities))-->
<!--				<div class="col-sm-4 col-xs-6 col-xxs-12">-->
<!--					<div class="iconbox-wrap">-->
<!--						<div class="iconbox">-->
<!--							<div class="iconbox-wrap-icon">-->
<!--								<i class="icon icon-map"></i>-->
<!--							</div>-->
<!--							<div class="iconbox-wrap-content">-->
<!--								<h5><span>{{ $countCities . '+' }}</span></h5>-->
<!--								<div class="iconbox-wrap-text">{{ t('Locations') }}</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				@endif-->
	
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<!-- About Section Start -->
<div class="about-section section pt-70 mb-70 pt-md-70 pt-xs-35 pt-sm-70  pb-110 pb-md-90 pb-sm-70 pb-xs-60 counter-bg">
    <div class="container">
                   
        <!-- Project Count Area Start -->
        
        <div class="row project-count">
            @if (isset($countPosts))
            <div class="col-lg-4 col-md-4 col-sm-4 mt-25">
                <!-- counter start -->
                <div class="counter text-center">
                    <h3 class="counter-active">{{ $countPosts }}</h3>
                    <p>Total Ads</p>
                </div>
                <!-- counter end -->
            </div>
            @endif
            @if (isset($countUsers))
            <div class="col-lg-4 col-md-4 col-sm-4 mt-25">
                <!-- counter start -->
                <div class="counter  text-center">
                    <h3 class="counter-active">{{ $countUsers }}</h3>
                    <p>Trusted Sellers</p>
                </div>
                <!-- counter end -->
            </div>
            @endif
            
            @if (isset($countCities))
            <div class="col-lg-4 col-md-4 col-sm-4 mt-25">
                <!-- counter start --> 
                <div class="counter  text-center">
                    <h3 class="counter-active">{{ $countCities }}</h3>
                    <p>Locations</p>
                </div>
                <!-- counter end -->
            </div>
            @endif
            <!--<div class="col-lg-3 col-md-6 col-sm-6 mt-25">-->
                <!-- counter start --> 
            <!--    <div class="counter  text-center">-->
            <!--        <h3 class="counter-active">850</h3>-->
            <!--        <p>Property Available</p>-->
            <!--    </div>-->
                <!-- counter end -->
            <!--</div>-->
        </div>
        <!-- Project Count Area End -->
                    
    </div>
</div><!-- About Section End -->

@endif

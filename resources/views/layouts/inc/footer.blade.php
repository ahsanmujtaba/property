<?php
if (
	config('settings.other.ios_app_url') ||
	config('settings.other.android_app_url') ||
	config('settings.social_link.facebook_page_url') ||
	config('settings.social_link.twitter_url') ||
	config('settings.social_link.google_plus_url') ||
	config('settings.social_link.linkedin_url') ||
	config('settings.social_link.pinterest_url') ||
	config('settings.social_link.instagram_url')
) {
	$colClass1 = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
	$colClass2 = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
	$colClass3 = 'col-lg-2 col-md-2 col-sm-2 col-xs-12';
	$colClass4 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
} else {
	$colClass1 = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
	$colClass2 = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
	$colClass3 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
	$colClass4 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
}
?>
{{--<footer class="main-footer">--}}
{{--	<div class="footer-content">--}}
{{--		<div class="container">--}}
{{--			<div class="row">--}}
{{--				--}}
{{--				@if (!config('settings.footer.hide_links'))--}}
{{--					<div class="{{ $colClass1 }}">--}}
{{--						<div class="footer-col">--}}
{{--							<h4 class="footer-title">{{ t('About us') }}</h4>--}}
{{--							<ul class="list-unstyled footer-nav">--}}
{{--								@if (isset($pages) and $pages->count() > 0)--}}
{{--									@foreach($pages as $page)--}}
{{--										<li>--}}
{{--											<?php--}}
{{--												$linkTarget = '';--}}
{{--												if ($page->target_blank == 1) {--}}
{{--													$linkTarget = 'target="_blank"';--}}
{{--												}--}}
{{--											?>--}}
{{--											@if (!empty($page->external_link))--}}
{{--												<a href="{!! $page->external_link !!}" rel="nofollow" {!! $linkTarget !!}> {{ $page->name }} </a>--}}
{{--											@else--}}
{{--												<a href="{{ \App\Helpers\UrlGen::page($page) }}" {!! $linkTarget !!}> {{ $page->name }} </a>--}}
{{--											@endif--}}
{{--										</li>--}}
{{--									@endforeach--}}
{{--								@endif--}}
{{--							</ul>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					--}}
{{--					<div class="{{ $colClass2 }}">--}}
{{--						<div class="footer-col">--}}
{{--							<h4 class="footer-title">{{ t('Contact & Sitemap') }}</h4>--}}
{{--							<ul class="list-unstyled footer-nav">--}}
{{--								<li><a href="{{ lurl(trans('routes.contact')) }}"> {{ t('Contact') }} </a></li>--}}
{{--								<li><a href="{{ \App\Helpers\UrlGen::sitemap() }}"> {{ t('Sitemap') }} </a></li>--}}
{{--								@if (\App\Models\Country::where('active', 1)->count() > 1)--}}
{{--									<li><a href="{{ lurl(trans('routes.countries')) }}"> {{ t('Countries') }} </a></li>--}}
{{--								@endif--}}
{{--							</ul>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					--}}
{{--					<div class="{{ $colClass3 }}">--}}
{{--						<div class="footer-col">--}}
{{--							<h4 class="footer-title">{{ t('My Account') }}</h4>--}}
{{--							<ul class="list-unstyled footer-nav">--}}
{{--								@if (!auth()->user())--}}
{{--									<li>--}}
{{--										@if (config('settings.security.login_open_in_modal'))--}}
{{--											<a href="#quickLogin" data-toggle="modal"> {{ t('Log In') }} </a>--}}
{{--										@else--}}
{{--											<a href="{{ lurl(trans('routes.login')) }}"> {{ t('Log In') }} </a>--}}
{{--										@endif--}}
{{--									</li>--}}
{{--									<li><a href="{{ lurl(trans('routes.register')) }}"> {{ t('Register') }} </a></li>--}}
{{--								@else--}}
{{--									<li><a href="{{ lurl('account') }}"> {{ t('Personal Home') }} </a></li>--}}
{{--									<li><a href="{{ lurl('account/my-posts') }}"> {{ t('My ads') }} </a></li>--}}
{{--									<li><a href="{{ lurl('account/favourite') }}"> {{ t('Favourite ads') }} </a></li>--}}
{{--								@endif--}}
{{--							</ul>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					--}}
{{--					@if (--}}
{{--						config('settings.other.ios_app_url') or--}}
{{--						config('settings.other.android_app_url') or--}}
{{--						config('settings.social_link.facebook_page_url') or--}}
{{--						config('settings.social_link.twitter_url') or--}}
{{--						config('settings.social_link.google_plus_url') or--}}
{{--						config('settings.social_link.linkedin_url') or--}}
{{--						config('settings.social_link.pinterest_url') or--}}
{{--						config('settings.social_link.instagram_url')--}}
{{--						)--}}
{{--						<div class="{{ $colClass4 }}">--}}
{{--							<div class="footer-col row">--}}
{{--								<?php--}}
{{--									$footerSocialClass = '';--}}
{{--									$footerSocialTitleClass = '';--}}
{{--								?>--}}
{{--								--}}{{-- @todo: API Plugin --}}
{{--								@if (config('settings.other.ios_app_url') or config('settings.other.android_app_url'))--}}
{{--									<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">--}}
{{--										<div class="mobile-app-content">--}}
{{--											<h4 class="footer-title">{{ t('Mobile Apps') }}</h4>--}}
{{--											<div class="row ">--}}
{{--												@if (config('settings.other.ios_app_url'))--}}
{{--												<div class="col-xs-12 col-sm-6">--}}
{{--													<a class="app-icon" target="_blank" href="{{ config('settings.other.ios_app_url') }}">--}}
{{--														<span class="hide-visually">{{ t('iOS app') }}</span>--}}
{{--														<img src="{{ url('images/site/app-store-badge.svg') }}" alt="{{ t('Available on the App Store') }}">--}}
{{--													</a>--}}
{{--												</div>--}}
{{--												@endif--}}
{{--												@if (config('settings.other.android_app_url'))--}}
{{--												<div class="col-xs-12 col-sm-6">--}}
{{--													<a class="app-icon" target="_blank" href="{{ config('settings.other.android_app_url') }}">--}}
{{--														<span class="hide-visually">{{ t('Android App') }}</span>--}}
{{--														<img src="{{ url('images/site/google-play-badge.svg') }}" alt="{{ t('Available on Google Play') }}">--}}
{{--													</a>--}}
{{--												</div>--}}
{{--												@endif--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--									<?php--}}
{{--										$footerSocialClass = 'hero-subscribe';--}}
{{--										$footerSocialTitleClass = 'no-margin';--}}
{{--									?>--}}
{{--								@endif--}}
{{--								--}}
{{--								@if (--}}
{{--									config('settings.social_link.facebook_page_url') or--}}
{{--									config('settings.social_link.twitter_url') or--}}
{{--									config('settings.social_link.google_plus_url') or--}}
{{--									config('settings.social_link.linkedin_url') or--}}
{{--									config('settings.social_link.pinterest_url') or--}}
{{--									config('settings.social_link.instagram_url')--}}
{{--									)--}}
{{--									<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">--}}
{{--										<div class="{!! $footerSocialClass !!}">--}}
{{--											<h4 class="footer-title {!! $footerSocialTitleClass !!}">{{ t('Follow us on') }}</h4>--}}
{{--											<ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">--}}
{{--												@if (config('settings.social_link.facebook_page_url'))--}}
{{--												<li>--}}
{{--													<a class="icon-color fb" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.facebook_page_url') }}" data-original-title="Facebook">--}}
{{--														<i class="fab fa-facebook"></i>--}}
{{--													</a>--}}
{{--												</li>--}}
{{--												@endif--}}
{{--												@if (config('settings.social_link.twitter_url'))--}}
{{--												<li>--}}
{{--													<a class="icon-color tw" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.twitter_url') }}" data-original-title="Twitter">--}}
{{--														<i class="fab fa-twitter"></i>--}}
{{--													</a>--}}
{{--												</li>--}}
{{--												@endif--}}
{{--												@if (config('settings.social_link.instagram_url'))--}}
{{--													<li>--}}
{{--														<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.instagram_url') }}" data-original-title="Instagram">--}}
{{--															<i class="icon-instagram-filled"></i>--}}
{{--														</a>--}}
{{--													</li>--}}
{{--												@endif--}}
{{--												@if (config('settings.social_link.google_plus_url'))--}}
{{--												<li>--}}
{{--													<a class="icon-color gp" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.google_plus_url') }}" data-original-title="Google+">--}}
{{--														<i class="fab fa-google-plus"></i>--}}
{{--													</a>--}}
{{--												</li>--}}
{{--												@endif--}}
{{--												@if (config('settings.social_link.linkedin_url'))--}}
{{--												<li>--}}
{{--													<a class="icon-color lin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.linkedin_url') }}" data-original-title="LinkedIn">--}}
{{--														<i class="fab fa-linkedin"></i>--}}
{{--													</a>--}}
{{--												</li>--}}
{{--												@endif--}}
{{--												@if (config('settings.social_link.pinterest_url'))--}}
{{--												<li>--}}
{{--													<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.pinterest_url') }}" data-original-title="Pinterest">--}}
{{--														<i class="fab fa-pinterest-p"></i>--}}
{{--													</a>--}}
{{--												</li>--}}
{{--												@endif--}}
{{--											</ul>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								@endif--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					@endif--}}
{{--					--}}
{{--					<div style="clear: both"></div>--}}
{{--				@endif--}}
{{--				--}}
{{--				<div class="col-xl-12">--}}
{{--					@if (!config('settings.footer.hide_payment_plugins_logos') and isset($paymentMethods) and $paymentMethods->count() > 0)--}}
{{--						<div class="text-center paymanet-method-logo">--}}
{{--							--}}{{-- Payment Plugins --}}
{{--							@foreach($paymentMethods as $paymentMethod)--}}
{{--								@if (file_exists(plugin_path($paymentMethod->name, 'public/images/payment.png')))--}}
{{--									<img src="{{ url('images/' . $paymentMethod->name . '/payment.png') }}" alt="{{ $paymentMethod->display_name }}" title="{{ $paymentMethod->display_name }}">--}}
{{--								@endif--}}
{{--							@endforeach--}}
{{--						</div>--}}
{{--					@else--}}
{{--						@if (!config('settings.footer.hide_links'))--}}
{{--							<hr>--}}
{{--						@endif--}}
{{--					@endif--}}
{{--					--}}
{{--					<div class="copy-info text-center">--}}
{{--						© {{ date('Y') }} {{ config('settings.app.app_name') }}. {{ t('All Rights Reserved') }}.--}}
{{--						@if (!config('settings.footer.hide_powered_by'))--}}
{{--							@if (config('settings.footer.powered_by_info'))--}}
{{--								{{ t('Powered by') }} {!! config('settings.footer.powered_by_info') !!}--}}
{{--							@else--}}
{{--								{{ t('Powered by') }} <a href="http://www.bedigit.com" title="BedigitCom">Bedigit</a>.--}}
{{--							@endif--}}
{{--						@endif--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			@endif--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</footer>--}}

<footer class="footer-section section ">
    @if (!config('settings.footer.hide_links'))
	<div class="footer-top footer-bg pt-70 pt-md-50 pt-sm-30 pt-xs-20 pb-100 pb-md-90 pb-sm-70 pb-xs-60" style="background-image: url({{url('dist/assets/images/slider/footer-background-v2.jpg')}});">
		<div class="container">
			<div class="row">
				<div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
					<!-- Footer-widget Start -->
					<div class="footer-widget">
						<div class="footer-title">
							<h3>About</h3>
						</div>
						<div class="footer-info">
							<p>Ortiz is the best and popular real estate to you how all this mistaolt cing pleasure and
								praising ained wasnad pain was prexplain</p>
							<!--<div class="newsletter-box">-->

							<!--	<form id="mc-form" class="mc-form footer-newsletter">-->
							<!--		<input id="mc-email" type="email" autocomplete="off"-->
							<!--			   placeholder="Email for Newsletter"/>-->
							<!--		<button id="mc-submit"><i class="fa fa-paper-plane"></i></button>-->
							<!--	</form>-->
							<!--</div>-->

							<!-- mailchimp-alerts Start -->
							
							<div class="mailchimp-alerts text-centre">
								<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
								<div class="mailchimp-success"></div><!-- mailchimp-success end -->
								<div class="mailchimp-error"></div><!-- mailchimp-error end -->
							</div>
							<!-- mailchimp-alerts end -->
						</div>
					</div><!-- Footer-widget End -->
				</div>
				<div class="col-coustom-1 col-md-6 col-lg-3 col-12 mt-40">
					<!-- Footer-widget Start -->
					
					
					<div class="footer-widget">
						<div class="footer-title">
							<h3>About Us</h3>
						</div>
						<div class="footer-info">
							<ul class="footer-list">
								@if (isset($pages) and $pages->count() > 0)
									@foreach($pages as $page)
										<li>
											@if (!empty($page->external_link))
												<a href="{!! $page->external_link !!}" rel="nofollow" > {{ $page->name }} </a>
										@else
												<a href="{{ \App\Helpers\UrlGen::page($page) }}" > {{ $page->name }} </a>
											@endif
										</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
					<!-- Footer-widget End -->
				</div>
				<div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
					<!-- Footer-widget Start -->
					<div class="footer-widget">
						<div class="footer-title">
							<h3>Contact</h3>
						</div>
						<div class="footer-info">
							<ul class="footer-list">
							    
								<li><a href="{{ lurl(trans('routes.contact')) }}"> {{ t('Contact') }} </a></li>
								<li><a href="{{ \App\Helpers\UrlGen::sitemap() }}"> {{ t('Sitemap') }} </a></li>
								@if (\App\Models\Country::where('active', 1)->count() > 1)
									<li><a href="{{ lurl(trans('routes.countries')) }}"> {{ t('Countries') }} </a></li>
								@endif
							</ul>
						</div>
					</div><!-- Footer-widget End -->
				</div>
				<div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
					<!-- Footer-widget Start -->
					<div class="footer-widget">
						<div class="footer-title">
							<h3>Contact Us</h3>
						</div>
						<div class="footer-info">
							<ul class="footer-list">
								<li>
									<div class="contact-text">
										<i class="glyph-icon flaticon-placeholder"></i>
										<p>256, 1st AVE, Manchester <br>125 , Noth England</p>
									</div>
								</li>
								<li>
									<div class="contact-text">
										<i class="glyph-icon flaticon-call"></i>
										<p>
											<span>Telephone : <a href="tel:1234566789"> +88 (012) 356 958 45</a></span>
											<span>Telephone : <a href="tel:1234566789"> +88 (012) 356 958 45</a></span>
										</p>

									</div>
								</li>
								<li>
									<div class="contact-text">
										<i class="glyph-icon flaticon-earth"></i>
										<p>
											<span>Email : <a href="mailto:info@example.com">info@example.com</a></span>
											<span>Web : <a href="https://hasthemes.com/">www.example.com</a></span>
										</p>
									</div>
								</li>
								<li>
								    
									<p>
									    @if (
        									config('settings.social_link.facebook_page_url') or
        									config('settings.social_link.twitter_url') or
        									config('settings.social_link.google_plus_url') or
        									config('settings.social_link.linkedin_url') or
        									config('settings.social_link.pinterest_url') or
        									config('settings.social_link.instagram_url')
        									)
									    <ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
												@if(config('settings.social_link.facebook_page_url'))
												<li>
													<a class="icon-color fb"  href="{{config('settings.social_link.facebook_page_url')}}" >
														<i class="fab fa-facebook"></i>
													</a>
												</li>
												@endif
												@if(config('settings.social_link.twitter_url'))
												<li>
													<a class="icon-color tw"  href="{{config('settings.social_link.twitter_url')}}" >
														<i class="fab fa-twitter"></i>
													</a>
												</li>
												@endif
												@if(config('settings.social_link.instagram_url'))
												<li>
													<a class="icon-color pin"  href="{{config('settings.social_link.instagram_url')}}" >
														<i class="icon-instagram-filled"></i>
													</a>
												</li>
												@endif
												@if(config('settings.social_link.google_plus_url'))
												<li>
													<a class="icon-color gp"  href="{{config('settings.social_link.google_plus_url')}}" >
														<i class="fab fa-google-plus"></i>
													</a>
												</li>
												@endif
												@if(config('settings.social_link.linkedin_url'))
												<li>
													<a class="icon-color lin"  href="{{config('settings.social_link.linkedin_url')}}" >
														<i class="fab fa-linkedin"></i>
													</a>
												</li>
												@endif
												@if(config('settings.social_link.pinterest_url'))
												<li>
													<a class="icon-color pin"  href="{{config('settings.social_link.pinterest_url')}}" >
														<i class="fab fa-pinterest-p"></i>
													</a>
												</li>
												@endif
												
												
										</ul>
										@endif
									</p>
									
								</li>
							</ul>
						</div>
					</div><!-- Footer-widget End -->
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>© {{ date('Y') }} {{ config('settings.app.app_name') }}. {{ t('All Rights Reserved') }}. 
					    @if (!config('settings.footer.hide_powered_by'))
							@if (config('settings.footer.powered_by_info'))
								{{ t('Powered by') }} {!! config('settings.footer.powered_by_info') !!}
							@else
								{{ t('Powered by') }} <a href="http://www.bedigit.com" title="BedigitCom">Bedigit</a>.
							@endif
						@endif
				    </p>
				</div>
			</div>
		</div>
	</div>

</footer><!-- Footer Section End -->

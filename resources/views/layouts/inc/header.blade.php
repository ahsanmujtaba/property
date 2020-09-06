<?php
// Search parameters
$queryString = (request()->getQueryString() ? ('?' . request()->getQueryString()) : '');

// Get the Default Language
$cacheExpiration = (isset($cacheExpiration)) ? $cacheExpiration : config('settings.optimization.cache_expiration', 86400);
$defaultLang = Cache::remember('language.default', $cacheExpiration, function () {
	$defaultLang = \App\Models\Language::where('default', 1)->first();
	return $defaultLang;
});

// Check if the Multi-Countries selection is enabled
$multiCountriesIsEnabled = false;
$multiCountriesLabel = '';
if (config('settings.geo_location.country_flag_activation')) {
	if (!empty(config('country.code'))) {
		if (\App\Models\Country::where('active', 1)->count() > 1) {
			$multiCountriesIsEnabled = true;
			$multiCountriesLabel = 'title="' . t('Select a Country') . '"';
		}
	}
}

// Logo Label
$logoLabel = '';
if (getSegment(1) != trans('routes.countries')) {
	$logoLabel = config('settings.app.app_name') . ((!empty(config('country.name'))) ? ' ' . config('country.name') : '');
}
?>
<div class="header d-none ">
	<nav class="navbar fixed-top navbar-site navbar-light bg-light navbar-expand-md" role="navigation">
		<div class="container">

			<div class="navbar-identity">
				{{-- Logo --}}
				<a href="{{ lurl('/') }}" class="navbar-brand logo logo-title">
					<img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}"
						 alt="{{ strtolower(config('settings.app.app_name')) }}" class="tooltipHere main-logo" title="" data-placement="bottom"
						 data-toggle="tooltip"
						 data-original-title="{!! isset($logoLabel) ? $logoLabel : '' !!}"/>
				</a>
				{{-- Toggle Nav (Mobile) --}}
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right" type="button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
						<title>{{ t('Menu') }}</title>
						<path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
					</svg>
				</button>
				{{-- Country Flag (Mobile) --}}
				@if (getSegment(1) != trans('routes.countries'))
					@if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled)
						@if (!empty(config('country.icode')))
							@if (file_exists(public_path() . '/images/flags/24/' . config('country.icode') . '.png'))
								<button class="flag-menu country-flag d-block d-md-none btn btn-secondary hidden pull-right" href="#selectCountry" data-toggle="modal">
									<img src="{{ url('images/flags/24/' . config('country.icode') . '.png') . getPictureVersion() }}" style="float: left;">
									<span class="caret hidden-xs"></span>
								</button>
							@endif
						@endif
					@endif
				@endif
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					{{-- Country Flag --}}
					@if (getSegment(1) != trans('routes.countries'))
						@if (config('settings.geo_location.country_flag_activation'))
							@if (!empty(config('country.icode')))
								@if (file_exists(public_path() . '/images/flags/32/' . config('country.icode') . '.png'))
									<li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip" data-placement="{{ (config('lang.direction') == 'rtl') ? 'bottom' : 'right' }}" {!! $multiCountriesLabel !!}>
										@if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled)
											<a href="#selectCountry" data-toggle="modal" class="nav-link">
												<img class="flag-icon" src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}">
												<span class="caret hidden-sm"></span>
											</a>
										@else
											<a style="cursor: default;">
												<img class="flag-icon no-caret" src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}">
											</a>
										@endif
									</li>
								@endif
							@endif
						@endif
					@endif
				</ul>

				<ul class="nav navbar-nav ml-auto navbar-right">
					@if (!auth()->check())
						<li class="nav-item">
							@if (config('settings.security.login_open_in_modal'))
								<a href="#quickLogin" class="nav-link" data-toggle="modal"><i class="icon-user fa"></i> {{ t('Log In') }}</a>
							@else
								<a href="{{ lurl(trans('routes.login')) }}" class="nav-link"><i class="icon-user fa"></i> {{ t('Log In') }}</a>
							@endif
						</li>
						<li class="nav-item">
							<a href="{{ lurl(trans('routes.register')) }}" class="nav-link"><i class="icon-user-add fa"></i> {{ t('Register') }}</a>
						</li>
					@else
						<li class="nav-item">
							@if (app('impersonate')->isImpersonating())
								<a href="{{ route('impersonate.leave') }}" class="nav-link">
									<i class="icon-logout hidden-sm"></i> {{ t('Leave') }}
								</a>
							@else
								<a href="{{ lurl(trans('routes.logout')) }}" class="nav-link">
									<i class="icon-logout hidden-sm"></i> {{ t('Log Out') }}
								</a>
							@endif
						</li>
						<li class="nav-item dropdown no-arrow">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<i class="icon-user fa hidden-sm"></i>
								<span>{{ auth()->user()->name }}</span>
								<span class="badge badge-pill badge-important count-conversations-with-new-messages hidden-sm">0</span>
								<i class="icon-down-open-big fa hidden-sm"></i>
							</a>
							<ul id="userMenuDropdown" class="dropdown-menu user-menu dropdown-menu-right shadow-sm">
								<li class="dropdown-item active">
									<a href="{{ lurl('account') }}">
										<i class="icon-home"></i> {{ t('Personal Home') }}
									</a>
								</li>
								<li class="dropdown-item"><a href="{{ lurl('account/my-posts') }}"><i class="icon-th-thumb"></i> {{ t('My ads') }} </a></li>
								<li class="dropdown-item"><a href="{{ lurl('account/favourite') }}"><i class="icon-heart"></i> {{ t('Favourite ads') }} </a></li>
								<li class="dropdown-item"><a href="{{ lurl('account/saved-search') }}"><i class="icon-star-circled"></i> {{ t('Saved searches') }} </a></li>
								<li class="dropdown-item"><a href="{{ lurl('account/pending-approval') }}"><i class="icon-hourglass"></i> {{ t('Pending approval') }} </a></li>
								<li class="dropdown-item"><a href="{{ lurl('account/archived') }}"><i class="icon-folder-close"></i> {{ t('Archived ads') }}</a></li>
								<li class="dropdown-item">
									<a href="{{ lurl('account/conversations') }}">
										<i class="icon-mail-1"></i> {{ t('Conversations') }}
										<span class="badge badge-pill badge-important count-conversations-with-new-messages">0</span>
									</a>
								</li>
								<li class="dropdown-item"><a href="{{ lurl('account/transactions') }}"><i class="icon-money"></i> {{ t('Transactions') }}</a></li>
							</ul>
						</li>
					@endif

					@if (config('plugins.currencyexchange.installed'))
						@include('currencyexchange::select-currency')
					@endif

					<li class="nav-item postadd">
						@if (!auth()->check())
							@if (config('settings.single.guests_can_post_ads') != '1')
								<a class="btn btn-block btn-border btn-post btn-add-listing" href="#quickLogin" data-toggle="modal">
									<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
								</a>
							@else
								<a class="btn btn-block btn-border btn-post btn-add-listing" href="{{ \App\Helpers\UrlGen::addPost() }}">
									<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
								</a>
							@endif
						@else
							<a class="btn btn-block btn-border btn-post btn-add-listing" href="{{ \App\Helpers\UrlGen::addPost() }}">
								<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
							</a>
						@endif
					</li>

					@include('layouts.inc.menu.select-language')

				</ul>
			</div>


		</div>
	</nav>
</div>



<header class="header-wrapper header  section">
	<div class="header-top bg-theme-two section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">



					<!--<div class="header-top-info">-->
					<!--	<p class="text-white">Call us -  <a href="tel:21548987658">21548 987 658</a></p>-->
					<!--</div>-->
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="header-buttons">
						@if (!auth()->check())
							@if (config('settings.single.guests_can_post_ads') != '1')

								<a class="header-btn btn" href="{{ lurl(trans('routes.login')) }}">Post New Ad</a>
							@else
								<a class="header-btn btn" href="{{ \App\Helpers\UrlGen::addPost() }}">Post New Ad</a>
							@endif
						@else
							<a class="header-btn btn" href="{{ \App\Helpers\UrlGen::addPost() }}">Post New Ad</a>
						@endif
                        @if(!auth()->check())
						<a class="header-btn" href="{{ lurl(trans('routes.register')) }}" >Register</a>
						<a class="header-btn" href="{{ lurl(trans('routes.login')) }}">Login</a>
						
                        @else
						
							@if (app('impersonate')->isImpersonating())
							    <a class="header-btn" href="{{ route('impersonate.leave') }}"><i class="icon-logout hidden-sm"></i> {{ t('Leave') }}</a>
								
							@else
							    <a class="header-btn" href="{{ lurl(trans('routes.logout')) }}"><i class="icon-logout hidden-sm"></i> {{ t('Log Out') }}</a>
								
							@endif
							
						    <a class="header-btn" href="{{ lurl('account') }}"><i class="icon-user fa hidden-sm"></i> {{ auth()->user()->name }}</a>
						
					@endif
					
						{{-- Country Flag --}}
						@if (getSegment(1) != trans('routes.countries'))
							@if (config('settings.geo_location.country_flag_activation'))
								@if (!empty(config('country.icode')))
									@if (file_exists(public_path() . '/images/flags/32/' . config('country.icode') . '.png'))
										<li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip" data-placement="{{ (config('lang.direction') == 'rtl') ? 'bottom' : 'right' }}" {!! $multiCountriesLabel !!}>
											@if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled)
												<a href="#selectCountry" data-toggle="modal" class="nav-link">
													<img class="flag-icon" src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}">
													<!--<span class="caret hidden-sm"></span>-->
												</a>
											@else
												<a style="cursor: default;">
													<img class="flag-icon no-caret" src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}">
												</a>
											@endif
										</li>
									@endif
								@endif
							@endif
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="header-section section">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-2 col-6">
					<div class="header-logo">
						{{-- Logo --}}
						<a href="{{ lurl('/') }}">
							<img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}"
								 alt="{{ strtolower(config('settings.app.app_name')) }}" class="tooltipHere main-logo"/>
						</a>
						<!--<a href="index.html"><img src="assets/images/logo.png" alt=""></a>-->
					</div>
				</div>

				<div class="col-lg-10 col-6">
					<div class="header-mid_right-bar">
						<nav class="main-menu d-lg-block">
							<ul>
								<li><a href="{{ lurl('/') }}">Home</a>

								</li>
								<!--<li class="has-dropdown"><a href="#">Services</a>-->
								<!--	<ul class="sub-menu">-->
								<!--		<li><a href="#">Services</a></li>-->
								<!--		<li><a href="#">Single Services</a></li>-->
								<!--	</ul>-->
								<!--</li>-->
								<!--<li><a href="#">Features</a></li>-->
								<!--<li><a href="#">Properties</a>-->

								<!--</li>-->
								<!--<li class="has-dropdown"><a href="#">Pages</a>-->
								<!--	<ul class="sub-menu">-->
								<!--		<li class="has-dropdown menu-item-has-children"><a href="blog.html">Blog Page</a>-->
								<!--			<ul class="sub-menu">-->
								<!--				<li><a href="# ">Blog Page</a></li>-->
								<!--				<li><a href="#">Blog Left Sidebar</a></li>-->
								<!--				<li><a href="#">Blog Right Sidebar</a></li>-->
								<!--				<li><a href="# ">Blog Details</a></li>-->
								<!--			</ul>-->
								<!--		</li>-->
								<!--		<li><a href="#">About Page</a></li>-->
								<!--		<li><a href="#">Create agency</a></li>-->
								<!--		<li><a href="#">Login Page</a></li>-->
								<!--		<li><a href="#">Register Page</a></li>-->
								<!--	</ul>-->
								<!--</li>-->
								<!--<li class="has-dropdown"><a href="agent.html">Agent</a>-->
								<!--	<ul class="sub-menu">-->
								<!--		<li><a href="#">Agent</a></li>-->
								<!--		<li><a href="#">Agent Details</a></li>-->
								<!--	</ul>-->
								<!--</li>-->
								<li><a href="{{ lurl(trans('routes.contact')) }}"> {{ t('Contact') }} </a></li>
							</ul>
						</nav>
						<div id="search-overlay-trigger" class="search-icon">
							<a href="javascript:void(0)"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>

				<!-- Mobile Menu -->
				<div class="mobile-menu order-12 d-block d-lg-none col"></div>

			</div>
		</div>
	</div><!-- Header Section End -->




</header>

<?php $attr = ['countryCode' => config('country.icode')]; ?>
<!--  search overlay -->

<div class="search-overlay" id="search-overlay">

	<div class="search-overlay__header">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-6 ml-auto col-4">
					 
					<div class="search-content text-right">
						<span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-overlay__inner">
		<div class="search-overlay__body">
			<div class="search-overlay__form">
				<form  name="search" action="{{ lurl(trans('routes.v-search', $attr), $attr) }}" method="GET">
					<input type="text" name='q' placeholder="Search" style='color:#25a5de'>
					{!! csrf_field() !!}
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">-->
<!--  Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--          <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--        ...-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">-->
<!--    Launch demo modal-->
<!--  </button>-->


<!-- End of search overlay -->

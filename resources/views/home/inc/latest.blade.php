<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
if (config('settings.listing.display_mode') == '.compact-view') {
	$colDescBox = 'col-sm-9';
	$colPriceBox = 'col-sm-3';
} else {
	$colDescBox = 'col-sm-7';
	$colPriceBox = 'col-sm-3';
}
?>
@if (isset($posts) and count($posts) > 0)
	@include('home.inc.spacer')
	<div class="container-fluid	d-none">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							<span class="title-3">{!! t('Home - Latest Ads') !!}</span>
							<?php $attr = ['countryCode' => config('country.icode')]; ?>
							<a href="{{ lurl(trans('routes.v-search', $attr), $attr) }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
				
				<div id="postsList" class="adds-wrapper noSideBar category-list">


				<div class="row w-100 p-5">
					<?php
					foreach($posts as $key => $post):

					if (empty($countries) or !$countries->has($post->country_code)) continue;
			
					// Get Package Info
					$package = null;
					if ($post->featured == 1) {
						$cacheId = 'package.' . $post->package_id . '.' . config('app.locale');
						$package = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
							$package = \App\Models\Package::findTrans($post->package_id);
							return $package;
						});
					}
			
					// Get PostType Info
					$cacheId = 'postType.' . $post->post_type_id . '.' . config('app.locale');
					$postType = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
						$postType = \App\Models\PostType::findTrans($post->post_type_id);
						return $postType;
					});
					if (empty($postType)) continue;
		
					// Get Post's Pictures
					$pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
					if ($pictures->count() > 0) {
						$postImg = imgUrl($pictures->first()->filename, 'medium');
					} else {
						$postImg = imgUrl(config('larapen.core.picture.default'));
					}
		
					// Get the Post's City
					$cacheId = config('country.code') . '.city.' . $post->city_id;
					$city = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
						$city = \App\Models\City::find($post->city_id);
						return $city;
					});
					if (empty($city)) continue;
					
					// Convert the created_at date to Carbon object
					$post->created_at = (new \Date($post->created_at))->timezone(config('timezone.id'));
					$post->created_at = $post->created_at->ago();
					
					// Category
					$cacheId = 'category.' . $post->category_id . '.' . config('app.locale');
					$liveCat = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
						$liveCat = \App\Models\Category::findTrans($post->category_id);
						return $liveCat;
					});
					
					// Check parent
					if (empty($liveCat->parent_id)) {
						$liveCatParentId = $liveCat->id;
					} else {
						$liveCatParentId = $liveCat->parent_id;
					}
					
					// Check translation
					$liveCatName = $liveCat->name;
					?>
						@if (isset($package) and !empty($package))
							@if ($package->ribbon != '')
								<div class="cornerRibbons {{ $package->ribbon }}"><a href="#"> {{ $package->short_name }}</a></div>
							@endif
						@endif
						<div class="col-lg-3 col-md-6 col-12  ">
							<!-- single-property Start -->
							<div class="single-property mt-30 ">
								<div class="property-img">
									<a href="{{ \App\Helpers\UrlGen::post($post) }}">
										<span class="photo-count"><i class="fa fa-camera"></i> {{ $pictures->count() }} </span>

									<!--<span class="level-stryker d-none">FOR RENT</span>-->
									</a>
									<a href="{{ \App\Helpers\UrlGen::post($post) }}">
										<img class="lazyload img-thumbnail no-margin" src="{{ $postImg }}" alt="{{ $post->title }}"/>
									</a>
								</div>
								<div class="property-desc">
									<h4>	<a href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 70) }} </a>
									</h4>
									<p>
										<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="{{ $postType->name }}">
											{{ strtoupper(mb_substr($postType->name, 0, 1)) }}
										</span>&nbsp;
										<span class="date"><i class="icon-clock"></i> {{ $post->created_at }} </span>
										@if (isset($liveCatParentId) and isset($liveCatName))
											<span class="category">
												<i class="icon-folder-circled"></i>&nbsp;
												<a href="{!! qsurl(config('app.locale').'/'.trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except('c'), ['c'=>$liveCatParentId]), null, false) !!}" class="info-link">{{ $liveCatName }}</a>
											</span>
										@endif
										<span class="item-location">
											<i class="icon-location-2"></i>&nbsp;
										<a href="{!! qsurl(config('app.locale').'/'.trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except(['l', 'location']), ['l'=>$post->city_id]), null, false) !!}" class="info-link">{{ $city->name }}</a> {{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
										</span>
									</p>

									@if (config('plugins.reviews.installed'))
										@if (view()->exists('reviews::ratings-list'))
											@include('reviews::ratings-list')
										@endif
									@endif
									<div class="price-box">
										@if (isset($liveCat->type))
											@if (!in_array($liveCat->type, ['not-salable']))
												@if ($post->price > 0)
													{!! \App\Helpers\Number::money($post->price) !!}
												@else
													{!! \App\Helpers\Number::money('--') !!}
												@endif
											@endif
										@else
											{{ '--' }}
										@endif
									</div>
								</div>
							</div><!-- single-property End -->
						</div>




					<?php endforeach; ?>
					
					
					
				</div>
					<div style="clear: both"></div>
					
					@if (isset($latestOptions) and isset($latestOptions['show_view_more_btn']) and $latestOptions['show_view_more_btn'] == '1')
						<div class="mb20 text-center">
							<?php $attr = ['countryCode' => config('country.icode')]; ?>
							<a href="{{ lurl(trans('routes.v-search', $attr), $attr) }}" class="btn btn-default mt10">
								<i class="fa fa-arrow-circle-right"></i> {{ t('View more') }}
							</a>
						</div>
					@endif
				</div>


				</div>
				
			</div>
		</div>
	</div>
	
@endif

<!-- Featured Properites Start -->   
<div class="featured-properites-section section pt-65 bg-white pb-65">
    <div class="container">
      
        <div class="row">
            <div class="section-title text-center col mb-30 mb-md-20 mb-xs-20 mb-sm-20">
                <h2>Latest Ads</h2>
                <p> one of the most popular real estate company all around USA. You <br> can find your dream property or build property with us</p>
            </div>
        </div>
       
        <div class="row">
           <?php
    			foreach($posts as $key => $post):
    
    			if (empty($countries) or !$countries->has($post->country_code)) continue;
    	
    			// Get Package Info
    			$package = null;
    			if ($post->featured == 1) {
    				$cacheId = 'package.' . $post->package_id . '.' . config('app.locale');
    				$package = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
    					$package = \App\Models\Package::findTrans($post->package_id);
    					return $package;
    				});
    			}
    	
    			// Get PostType Info
    			$cacheId = 'postType.' . $post->post_type_id . '.' . config('app.locale');
    			$postType = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
    				$postType = \App\Models\PostType::findTrans($post->post_type_id);
    				return $postType;
    			});
    			if (empty($postType)) continue;
    
    			// Get Post's Pictures
    			$pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
    			if ($pictures->count() > 0) {
    				$postImg = imgUrl($pictures->first()->filename, 'medium');
    			} else {
    				$postImg = imgUrl(config('larapen.core.picture.default'));
    			}
    
    			// Get the Post's City
    			$cacheId = config('country.code') . '.city.' . $post->city_id;
    			$city = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
    				$city = \App\Models\City::find($post->city_id);
    				return $city;
    			});
    			if (empty($city)) continue;
    			
    			// Convert the created_at date to Carbon object
    			$post->created_at = (new \Date($post->created_at))->timezone(config('timezone.id'));
    			$post->created_at = $post->created_at->ago();
    			
    			// Category
    			$cacheId = 'category.' . $post->category_id . '.' . config('app.locale');
    			$liveCat = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
    				$liveCat = \App\Models\Category::findTrans($post->category_id);
    				return $liveCat;
    			});
    			
    			// Check parent
    			if (empty($liveCat->parent_id)) {
    				$liveCatParentId = $liveCat->id;
    			} else {
    				$liveCatParentId = $liveCat->parent_id;
    			}
    			
    			// Check translation
    			$liveCatName = $liveCat->name;
    		?>
					
            <div class="col-lg-3 col-md-6 col-12">
                <!-- single-property Start -->
                <div class="single-property mt-30">
                    <div class="property-img">
                        <a href="{{ \App\Helpers\UrlGen::post($post) }}">
                            <img src="{{ $postImg }}" alt="">
                        </a>
                        <span class="level-stryker{{ $postType->name=='Professional' ? '' : '-2' }}">{{ $postType->name }}</span>
                        
                    </div>
                    <div class="property-desc">
                        <h4><a href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 20) }}</a></h4>
                        <p>
                            <span class="location">
                                
								<i class="icon-location-2"></i>&nbsp;
								<a href="{!! qsurl(config('app.locale').'/'.trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except(['l', 'location']), ['l'=>$post->city_id]), null, false) !!}" >{{ $city->name }}</a> {{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
						
							</span>
							<br>
							<span class="location">
								@if (isset($liveCatParentId) and isset($liveCatName))
										<i class="icon-folder-circled"></i>&nbsp;
										<a href="{!! qsurl(config('app.locale').'/'.trans('routes.v-search', ['countryCode' => config('country.icode')]), array_merge(request()->except('c'), ['c'=>$liveCatParentId]), null, false) !!}" >{{ \Illuminate\Support\Str::limit($liveCatName, 20)  }}</a>
								@endif
							</span>
						
                            
                        </p>
                        <div class="price-box">
                            <p>Price 
                            @if (isset($liveCat->type))
											@if (!in_array($liveCat->type, ['not-salable']))
												@if ($post->price > 0)
													{!! \App\Helpers\Number::money($post->price) !!}
												@else
													{!! \App\Helpers\Number::money('--') !!}
												@endif
											@endif
										@else
											{{ '--' }}
										@endif
										
                            </p>
                        </div>
                    </div>
                </div><!-- single-property End -->
            </div>
            
            <?php endforeach; ?>
            
        </div>
        
    </div>
</div><!-- Featured Properites End -->  

@section('after_scripts')
    @parent
    <script>
		/* Default view (See in /js/script.js) */
		@if (isset($posts) and count($posts) > 0)
			@if (config('settings.listing.display_mode') == '.grid-view')
				gridView('.grid-view');
			@elseif (config('settings.listing.display_mode') == '.list-view')
				listView('.list-view');
			@elseif (config('settings.listing.display_mode') == '.compact-view')
				compactView('.compact-view');
			@else
				gridView('.grid-view');
			@endif
		@else
			listView('.list-view');
		@endif
		/* Save the Search page display mode */
		var listingDisplayMode = readCookie('listing_display_mode');
		if (!listingDisplayMode) {
			createCookie('listing_display_mode', '{{ config('settings.listing.display_mode', '.grid-view') }}', 7);
		}
		
		/* Favorites Translation */
		var lang = {
			labelSavePostSave: "{!! t('Save ad') !!}",
			labelSavePostRemove: "{!! t('Remove favorite') !!}",
			loginToSavePost: "{!! t('Please log in to save the Ads.') !!}",
			loginToSaveSearch: "{!! t('Please log in to save your search.') !!}",
			confirmationSavePost: "{!! t('Post saved in favorites successfully !') !!}",
			confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully !') !!}",
			confirmationSaveSearch: "{!! t('Search saved successfully !') !!}",
			confirmationRemoveSaveSearch: "{!! t('Search deleted successfully !') !!}"
		};
    </script>
@endsection
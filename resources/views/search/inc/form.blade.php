<?php
// Keywords
$keywords = rawurldecode(request()->get('q'));

// Category
$qCategory = (isset($cat) and !empty($cat)) ? $cat->tid : request()->get('c');

// Location
if (isset($city) and !empty($city)) {
	$qLocationId = (isset($city->id)) ? $city->id : 0;
	$qLocation = $city->name;
	$qAdmin = request()->get('r');
} else {
	$qLocationId = request()->get('l');
	$qLocation = (request()->filled('r')) ? t('area:') . rawurldecode(request()->get('r')) : request()->get('location');
    $qAdmin = request()->get('r');
}
?>

<!--<div class="container">-->
<!--	<div class="search-row-wrapper">-->
<!--		<div class="container">-->
<!--			<?php $attr = ['countryCode' => config('country.icode')]; ?>-->
<!--			<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', $attr), $attr) }}" method="GET">-->
<!--				<div class="row m-0">-->
<!--					<div class="col-xl-3 col-md-3 col-sm-12 col-xs-12">-->
<!--						<select name="c" id="catSearch" class="form-control selecter">-->
<!--							<option value="" {{ ($qCategory=='') ? 'selected="selected"' : '' }}> {{ t('All Categories') }} </option>-->
<!--							@if (isset($cats) and $cats->count() > 0)-->
<!--								@foreach ($cats->groupBy('parent_id')->get(0) as $itemCat)-->
<!--									<option {{ ($qCategory==$itemCat->tid) ? ' selected="selected"' : '' }} value="{{ $itemCat->tid }}"> {{ $itemCat->name }} </option>-->
<!--								@endforeach-->
<!--							@endif-->
<!--						</select>-->
<!--					</div>-->
					
<!--					<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">-->
<!--						<input name="q" class="form-control keyword" type="text" placeholder="{{ t('What?') }}" value="{{ $keywords }}">-->
<!--					</div>-->
					
<!--					<div class="col-xl-3 col-md-3 col-sm-12 col-xs-12 search-col locationicon">-->
<!--						<i class="icon-location-2 icon-append"></i>-->
<!--						<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon tooltipHere"-->
<!--							   placeholder="{{ t('Where?') }}" value="{{ $qLocation }}" title="" data-placement="bottom"-->
<!--							   data-toggle="tooltip"-->
<!--							   data-original-title="{{ t('Enter a city name OR a state name with the prefix ":prefix" like: :prefix', ['prefix' => t('area:')]) . t('State Name') }}">-->
<!--					</div>-->
	
<!--					<input type="hidden" id="lSearch" name="l" value="{{ $qLocationId }}">-->
<!--					<input type="hidden" id="rSearch" name="r" value="{{ $qAdmin }}">-->
	
<!--					<div class="col-xl-2 col-md-2 col-sm-12 col-xs-12">-->
<!--						<button class="btn btn-block btn-primary">-->
<!--							<i class="fa fa-search"></i> <strong>{{ t('Find') }}</strong>-->
<!--						</button>-->
<!--					</div>-->
<!--					{!! csrf_field() !!}-->
<!--				</div>-->
<!--			</form>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<!-- Breadcrumb -->
<div class="breadcrumb-area section" style="background-image: url({{url('dist/assets/images/bg/breadcrumb.jpg')}})">
    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>Search</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item">
        				<?php $attr = ['countryCode' => config('country.icode')]; ?>
        				<a href="{{ lurl(trans('routes.v-search', $attr), $attr) }}">
        					{{ config('country.name') }}
        				</a>
            			</li>
            			@if (isset($bcTab) and count($bcTab) > 0)
            				@foreach($bcTab as $key => $value)
            					<?php $value = collect($value); ?>
            					@if ($value->has('position') and $value->get('position') > count($bcTab)+1)
            						<li class="breadcrumb-item active">
            							{!! $value->get('name') !!}
            							&nbsp;
            							@if (isset($city) or isset($admin))
            								<a href="#browseAdminCities" id="dropdownMenu1" data-toggle="modal"> <span class="caret"></span></a>
            							@endif
            						</li>
            					@else
            						<li class="breadcrumb-item"><a href="{{ $value->get('url') }}">{!! $value->get('name') !!}</a></li>
            					@endif
            				@endforeach
            			@endif
            			
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->

<div class="search-section section  mb-3 mt-3">
    <div class="container">
        
        <div class="search-wrap mt__0">
            
            <form id="search" name="search" action="{{ lurl(trans('routes.v-search', $attr), $attr) }}" method="GET">
                <div class="row">
                    <!--<div class="col-lg-3 col-md-6 col-12 mb-25">-->
                    <!--    <select class="niceselecter">-->
                    <!--        <option>Location One</option>-->
                    <!--        <option>Location Two</option>-->
                    <!--        <option>Location Three</option>-->
                    <!--        <option>Location Four</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <div class="col-lg-4 col-md-4 col-12 mb-25">
                        <input type="text" name="q" class=" keyword has-icon" placeholder="Search... " value="{{ $keywords }}">
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-12 mb-25">
                        
						
							<input type="text" id="locSearch" name="location" class="locinput input-rel searchtag-input has-icon"
								   placeholder="{{ t('Location') }}" value="{{ $qLocation }}">
								   
						<input type="hidden" id="lSearch" name="l" value="{{ $qLocationId }}">
					    <input type="hidden" id="rSearch" name="r" value="{{ $qAdmin }}">
                    </div>
                    
                    
                    
                    <div class="col-lg-4 col-md-4 col-12 mb-25">
                        <input type="submit" value="search">
                    </div>
                    
                    {!! csrf_field() !!}
                    
                    
                </div>
            </form>
        </div>
        
    </div>
</div>

@section('after_scripts')
	@parent
	<script>
		$(document).ready(function () {
			$('#locSearch').on('change', function () {
				if ($(this).val() == '') {
					$('#lSearch').val('');
					$('#rSearch').val('');
				}
			});
		});
	</script>
@endsection

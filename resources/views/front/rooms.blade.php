@extends('layouts.app')

@section('content')
<style>
	.impx-slide-container.style1 {
		height: auto;
	}
</style>
<!-- PAGE HEADING -->
<div class="impx-slide-container style1 resto">
	<div class="impx-slideshow-fw">
		<div style="background-image: url(https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080)" class="impx-hero-resto uk-position-relative  uk-background-fixed uk-background-center-center uk-height-1-1">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-grid uk-flex uk-flex-center uk-flex-middle">
					<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-1@m  uk-width-1-1@s uk-position-center uk-margin-large-top">
						<div class="impx-slide-fw-caption resto-caption uk-position-relative uk-position-z-index uk-text-center uk-light">
							<!-- intro -->
							<h1 class="impx-text-shadow">{{ $hotel->name }} Rooms</h1>
							<p class="uk-margin-remove impx-text-shadow uk-text-lead">{{ $hotel->description }}</p>
							<div class="uk-margin">
								<i class="fa fa-coffee impx-slide-icon impx-text-white"></i>
								<i class="fa fa-cutlery impx-slide-icon impx-text-white"></i>
								<i class="fa fa-glass impx-slide-icon impx-text-white"></i>
							</div>
							<!-- intro end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- PAGE HEADING END -->

<!-- Why choose us section -->

<!-- CONTENT -->
<div class="uk-padding  uk-padding-remove-horizontal">
    <div class="uk-container">
        <!-- ROOMS LIST -->
        <div class="uk-padding  uk-padding-remove-horizontal">
			<div class="uk-container">

				<!-- ROOMS LIST -->
				<div class="uk-position-relative uk-visible-toggle uk-margin-small-top">
			        <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s data-uk-grid uk-grid-match uk-margin-large-bottom"  data-uk-grid>
					@foreach($rooms as $index => $room)
						@php
							// Determine if this item is in an even row or odd row
							$rowIndex = floor((($rooms->currentPage() - 1) * $rooms->perPage() + $index) / 2);
							$imageLeft = $rowIndex % 2 === 0;
						@endphp
						<li>
							<div class="impx-room-item medium uk-box-shadow-large">
								<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s" data-uk-grid>
									
									@if($imageLeft)
										{{-- Image Left --}}
										<div class="uk-card-media-left uk-cover-container uk-position-relative">
											<canvas width="290" height="180"></canvas>
											<img src="{{ asset($room->image) }}" alt="" data-uk-cover>
											<div class="impx-overlay light overlay-squared padding-xwide"></div>
										</div>
										<div class="uk-card-body uk-position-relative impx-padding-medium">
									@else
										{{-- Image Right --}}
										<div class="uk-card-body uk-position-relative impx-padding-medium">
									@endif

											<div class="uk-card-header uk-padding-remove-horizontal">
												<h4 class="uk-card-title uk-margin-remove-bottom">{{ $room->room_type }}</h4>
												<p class="uk-text-meta uk-margin-remove-top">Capacity:{{ $room->capacity }} guests</p>
											</div>
											<span class="uk-card-badge uk-label bg-color-aqua">RM {{ $room->price }} Per Night</span>
											<ul class="uk-list room-fac">
												<li><span class="impx-text-aqua" data-uk-icon="icon: check;"></span> Free Wi-Fi</li>
												<li><span class="impx-text-aqua" data-uk-icon="icon: check;"></span> Air Conditioning</li>
												<li><span class="impx-text-aqua" data-uk-icon="icon: check;"></span> Room Service</li>
											</ul>
											<div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
												<a href="{{ route('rooms.show', $room->id) }}" class="uk-button uk-button-text impx-text-aqua">Read more &raquo;</a>
												<div class="uk-margin-small-top">
													<a style="background-color: #31a9a9;" href="{{ route('payment', $room->id) }}" class="uk-button uk-button-primary uk-width-1-1" id="bookButton">Book Now</a>
												</div>
											</div>
										</div>

									@if(!$imageLeft)
										<div class="uk-card-media-right uk-cover-container uk-position-relative">
											<canvas width="290" height="180"></canvas>
											<img src="{{ asset($room->image) }}" alt="" data-uk-cover>
											<div class="impx-overlay light overlay-squared padding-xwide"></div>
										</div>
									@endif
								</div>
							</div>
						</li>
					@endforeach
			        </ul>
			        <!-- rooms items end -->
		        </div>

		        <div class="uk-flex uk-flex-center">
					{{ $rooms->links('vendor.pagination.uikit') }}
				</div>
			</div>
		</div>
    </div>
</div>
<!-- CONTENT END -->

@include('front.bookingForm')
@endsection	
@extends('layouts.app')

@section('content')
<style>
	.impx-slide-container.style1 {
		height: auto;
	}
</style>
<div class="impx-slide-container style1 resto">
	<div class="impx-slideshow-fw">
		<div style="background-image: url({{ $roomDetail->banner_image }})" class="impx-hero-resto uk-position-relative  uk-background-fixed uk-background-center-center uk-height-1-1">
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


		<!-- CONTENT -->
		<div class="uk-padding vert uk-padding-remove-horizontal">
			<div class="uk-container">
				<div data-uk-grid>

					<div class="uk-width-1-1 uk-margin-medium-top">
						<!-- slider -->
						<div class="impx-room-slider">
							<div class="uk-position-relative" data-uk-slideshow="animation: fade">
							    <ul class="uk-slideshow-items">
							        <li>
							            <img src="{{ $roomDetail->image_1 }}" alt="" data-uk-cover>
							            <div class="impx-overlay"></div>
							        </li>
							        <li>
							            <img src="{{ $roomDetail->image_2 }}" alt="" data-uk-cover>
							            <div class="impx-overlay"></div>
							        </li>
							        <li>
							            <img src="{{ $roomDetail->image_3 }}" alt="" data-uk-cover>
							            <div class="impx-overlay"></div>
							        </li>
							        <li>
							            <img src="{{ $roomDetail->image_4 }}" alt="" data-uk-cover>
							            <div class="impx-overlay"></div>
							        </li>
									<li>
							            <img src="{{ $roomDetail->banner_image }}" alt="" data-uk-cover>
							            <div class="impx-overlay"></div>
							        </li>
							    </ul>
							    <!-- slider thumb nav -->
							    <div class="uk-position-center-left uk-position-medium">
							        <ul class="uk-thumbnav uk-thumbnav-vertical">
										<li data-uk-slideshow-item="1"><a href="#"><img src="{{ $roomDetail->image_1 }}" width="120" alt=""></a></li>
							            <li data-uk-slideshow-item="2"><a href="#"><img src="{{ $roomDetail->image_2 }}" width="120" alt=""></a></li>
							            <li data-uk-slideshow-item="3"><a href="#"><img src="{{ $roomDetail->image_3 }}" width="120" alt=""></a></li>
							            <li data-uk-slideshow-item="4"><a href="#"><img src="{{ $roomDetail->image_4 }}" width="120" alt=""></a></li>
							            <li data-uk-slideshow-item="0"><a href="#"><img src="{{ $roomDetail->banner_image }}" width="120" alt=""></a></li>
							        </ul>
							    </div>
							    <!-- slider thumb nav end -->
							</div>
						</div>
						<!-- slider end -->
					</div>

<!-- MAIN CONTENT -->
<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
    <!-- highlight -->
    <ul class="uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-2@s uk-grid-medium uk-grid-match" data-uk-grid>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-wifi fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Free Wi-Fi</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Stay connected with fast and complimentary Wi-Fi throughout the hotel premises.</p>
            </div>
        </li>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-bathtub fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Bathtub</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Unwind in a luxurious bathtub designed for comfort and relaxation after a long day.</p>
            </div>
        </li>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-tv fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Widescreen TV</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Enjoy your favorite movies and shows on a large HD screen with satellite channels.</p>
            </div>
        </li>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-heart-o fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Gym Studio</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Stay active in our fully-equipped fitness studio open 24/7 for all guests.</p>
            </div>
        </li>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-child fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Kids Playground</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Safe and fun play area for kids to enjoy while you relax or explore.</p>
            </div>
        </li>
        <li class="uk-text-center">
            <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                <i class="fa fa-coffee fa-2x impx-text-aqua"></i>
                <h6 class="uk-margin-remove-bottom uk-margin-small-top">Mini Café</h6>
                <p class="uk-margin-remove-bottom uk-margin-small-top">Delight in fresh coffee, snacks, and beverages just steps from your room.</p>
            </div>
        </li>
    </ul>
    <!-- highlight end -->

    <!-- room description -->
    <h4>Room Description</h4>
    <p class="impx-text-large">{{ $roomDetail->long_description }}</p>

    <p class="uk-margin-medium-bottom">{{ $roomDetail->long_description }}</p>

    <!-- room features list -->
    <div data-uk-grid>
        <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s">
            <h5>Additional Description</h5>
            <p>{{ $roomDetail->long_description }}</p>
        </div>
        <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s">
            <h5>More Facilities</h5>
            <ul class="uk-list uk-list-bullet impx-list">
                <li>In-room coffee and tea-making facilities</li>
                <li>Daily housekeeping service</li>
                <li>Secure electronic keycard access</li>
                <li>24-hour room service availability</li>
            </ul>
        </div>
    </div>

    <hr class="uk-divider-icon">
	<div class="uk-margin">
		<a href="{{ route('payment', $room->id) }}" class="uk-button uk-button-primary uk-width-1-1" id="bookButton">Book Now</a>
	</div>
</div>

					<!-- MAIN CONTENT -->

					<!-- SIDEBAR -->
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
						<!-- booking form -->
						<div class="bg-color-aqua uk-padding impx-padding-medium uk-margin-medium-bottom uk-box-shadow-medium">

							<div class="impx-hp-booking-form side-form uk-margin-bottom uk-margin-remove-top ">
								<h6 class="uk-heading-line uk-text-center uk-light uk-text-uppercase"><span>Booking Form</span></h6>
								<form action="{{ route('rooms.book') }}" method="POST" class="" id="bookingForm">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    
                                    @if(session('success'))
                                        <script>
                                            $.notify("{{ session('success') }}", "success");
                                        </script>
                                    @endif
                                    
                                    @if(session('error'))
                                        <script>
                                            $.notify("{{ session('error') }}", "error");
                                        </script>
                                    @endif
                                    
                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <div class="uk-inline">
                                                <label class="uk-form-label">Full Name</label>
                                                <span class="uk-form-icon" data-uk-icon="icon: user"></span>
                                                <input class="uk-input uk-border-rounded" type="text" name="name" placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <div class="uk-inline">
                                                <label class="uk-form-label">Email</label>
                                                <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                                                <input class="uk-input uk-border-rounded" type="email" name="email" placeholder="Enter your email" required>
                                            </div>
                                        </div>
                                    </div>
									
									@php
                                        $today = date('Y-m-d');
                                    @endphp

                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <div class="uk-inline">
                                                <label class="uk-form-label">Arrival Date</label>
                                                <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                                <input class="uk-input uk-border-rounded" type="date" name="check_in" min="{{ $today }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <div class="uk-inline">
                                                <label class="uk-form-label">Departure Date</label>
                                                <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                                <input class="uk-input uk-border-rounded" type="date" name="check_out" min="{{ $today }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <div class="uk-inline">
                                                <label class="uk-form-label">Number of Guests</label>
                                                <select class="uk-select uk-border-rounded" name="guests" required>
                                                    <option value="1">1 Guest</option>
                                                    <option value="2">2 Guests</option>
                                                    <option value="3">3 Guests</option>
                                                    <option value="4">4 Guests</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-1-1" id="bookButton">Book Now</button>
                                    </div>
                                </form>
							</div>
							<!-- booking form -->
						</div>
						<!-- SIDEBAR END -->

						<!-- related rooms -->
						<div class="uk-margin-large-bottom uk-padding impx-padding-medium bg-color-white uk-box-shadow-medium related-rooms">
							<h4 class="uk-heading-line uk-text-center">Other Rooms</h4><!-- title -->
							<!-- room items -->
					        <ul class="uk-child-width-1-1@xl uk-child-width-1-1@l uk-child-width-1-1@m uk-child-width-1-3@s impx-rooms style3 uk-margin-small-top uk-margin-remove-bottom data-uk-grid" data-uk-grid>
                                @foreach ($rooms as $room)
								<li>
									<a href="{{ route('rooms.show', $room->id) }}" class="uk-inline-clip uk-transition-toggle">
										<div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card other-item bg-color-aqua">
								        	<div class="uk-card-media-top">
								        		<div class="uk-position-relative">
									                <img src="{{ $room->image }}" alt="">
									                <div class="impx-overlay light overlay-squared padding-xwide"></div>
									            </div>
								                <div class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
								                	<h4 class="uk-card-title uk-margin-remove-bottom impx-text-white">{{ $room->room_type }}</h4>
								                	<!-- <div class="uk-card-badge uk-label bg-color-gold impx-text-white small">${{ $room->price }} Per Night</div> -->
									            </div>
								            </div>
								            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
												<p class="impx-text-white">
													Enjoy a relaxing stay with premium amenities designed to provide comfort, convenience, and luxury throughout your visit.
												</p>
												<ul class="uk-list room-fac impx-text-white">
													<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Comfortable King-sized Bed</li>
													<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Air Conditioning & Climate Control</li>
													<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Complimentary High-Speed Wi-Fi</li>
												</ul>
											</div>
							        	</div>
							        </a>
								</li>
                                @endforeach
							</ul>
						<!-- related rooms end -->

					</div>

				</div>
			</div>
		</div>	
		</div>					
		<!-- CONTENT END -->

		<!-- CONTACT INFO -->
		<div class="pre-footer-contact uk-padding bg-img2 uk-position-relative">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">

				<div data-uk-grid class="uk-padding-remove-bottom uk-position-relative">				
					<div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-3@s"><!-- address -->
						<h5 class="uk-heading-line uk-margin-remove-bottom"><span>Address</span></h5>
						<p class="impx-text-large uk-margin-top">Jalan imam,81310 skudai, <br> Johor Darul Ta’zim <br> Malaysia</p>
					</div>
					<div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s"><!-- phone -->
						<h5 class="uk-heading-line uk-margin-bottom"><span>Phone</span></h5>
						<p class="impx-text-large uk-margin-remove">+60164365793</p>
					</div>
					<div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s"><!-- email -->
						<h5 class="uk-heading-line uk-margin-bottom"><span>Email</span></h5>
						<a href="mailto:milkyhotel1@gmail.com" class="impx-text-large">milkyhotel1@gmail.com</a>
					</div>
				</div>

			</div>
		</div>
		<!-- CONTACT INFO END -->
@endsection

@section('scripts')

<script>
    
</script>

@endsection
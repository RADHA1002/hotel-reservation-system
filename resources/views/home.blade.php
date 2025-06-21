@extends('layouts.app')

@section('content')
<!-- SLIDESHOW -->
@include('front/slideshow')
<!-- SLIDESHOW END -->

<!-- SERVICES LIST & BOOKING FORM -->
@include('front/services')
<!-- SERVICES LIST & BOOKING FORM END -->

<!-- ROOMS LIST -->
@include('front/roomsListing')
<!-- ROOMS LIST END -->

<!-- WHY CHOOSE US? -->
<!-- WHY CHOOSE US? END -->

<!-- PRICING PLANS -->
<!-- PRICING PLANS END -->

<!-- TESTIMONIALS CAROUSEL -->
<!-- TESTIMONIALS CAROUSEL END -->

<!-- CONTACT SECTION -->
@include('front/contactUs')
<!-- CONTACT SECTION END -->
@endsection
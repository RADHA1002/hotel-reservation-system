@extends('layouts.app')

@section('content')
<div class="impx-slide-container style1 resto">
	<div class="impx-slideshow-fw">
		<div style="background-image: url({{ $room->image }})" class="impx-hero-resto uk-position-relative  uk-background-fixed uk-background-center-center uk-height-1-1">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-grid uk-flex uk-flex-center uk-flex-middle">
					<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-1@m  uk-width-1-1@s uk-position-center uk-margin-large-top">
						<div class="impx-slide-fw-caption resto-caption uk-position-relative uk-position-z-index uk-text-center uk-light">
							<!-- intro -->
							<h1 class="impx-text-shadow">{{ $room->room_type }} Rooms</h1>
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

<div class="uk-padding vert uk-padding-remove-horizontal">
    <div class="uk-container">
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-1">
                <div class="payment-container">
                    <h2 class="text-center mb-4">Payment Information</h2>
                    
                    <form id="paymentForm">
                        @csrf
                        <input type="hidden" name="room_id" id="room_id" value="{{ $room->id }}">
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Full Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                        </div>
                        @php $today = date('Y-m-d'); @endphp
                        <div class="form-group mb-3">
                            <label for="check_in">Arrival Date</label>
                            <input type="date" class="form-control" id="check_in" min="{{ $today }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="check_out">Departure Date</label>
                            <input type="date" class="form-control" id="check_out" min="{{ $today }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="guests">Guests</label>
                            <select class="form-control" id="guests" required>
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                                <option value="6">6 Guests</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Card Details</label>
                            <div id="card-element" class="card-input"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <input type="hidden" name="is_gateway" id="is_gateway" value="1">

                        <button type="submit" style="cursor: pointer;" class="btn btn-primary w-100">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-0D1otJ2/kPt+wg8OnlD+PQ7/N7oQrP1bD41vZ3pHATRV2Qxf5ku0K+yo6DbZJXxuGV6KeQqSWz0jWRRCLViSSA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payment-container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2.5rem 3rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .payment-container h2 {
            font-weight: 700;
            font-size: 1.75rem;
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            display: block;
            margin-bottom: .5rem;
            color: #444;
        }

        .form-control {
            border-radius: 8px;
            height: 46px;
            border: 1px solid #d1d5db;
            padding: 0 1rem;
            font-size: 1rem;
            background: #fff;
        }

        .form-control:focus {
            border-color: #1e87f0;
            box-shadow: 0 0 0 3px rgba(30, 135, 240, 0.15);
        }

        select.form-control {
            appearance: none;
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg fill="gray" height="24" viewBox="0 0 24 24" width="24"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
        }

        .card-input {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        #card-errors {
            color: #e3342f;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            background: linear-gradient(135deg, #1e87f0, #006fdc);
            border: none;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(30, 135, 240, 0.3);
        }

        #card-element{
            padding: .75rem .5rem;
            border:1px solid #dfe3e8;
            border-radius:8px;
        }
        #card-errors{
            color:#fa755a;
            margin-top:.5rem;
        }
        .payment-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .card-input {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .card-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .card-icon {
            font-size: 2rem;
            color: #6c757d;
        }
        .StripeElement {
            width: 100%;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        input, select {
            width: 100%;
        }
    </style>

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Initialize Stripe with test publishable key
        const stripe = Stripe('pk_test_51RbksMC5WZJmg4XmbhlkoOGEoiUEeDeVwfMXkZb32eGgPG5mZqNRRuGHjCyLGnWafLPvQTDINhtvG2QKyYBYhriR00GBgzo4pw');
        
        // Create an instance of Elements
        const elements = stripe.elements();
        
        // Create a card element
        const card = elements.create('card');
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element
        card.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        document.getElementById('paymentForm').addEventListener('submit', async function(event) {
            event.preventDefault();
            const payBtn = this.querySelector('button[type="submit"]');
            payBtn.disabled = true;
            payBtn.textContent = 'Processing...';

            // Step 1: Create payment intent
            const response = await fetch('/stripe/create-payment-intent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    check_in: document.getElementById('check_in').value,
                    check_out: document.getElementById('check_out').value,
                    guests: document.getElementById('guests').value,
                    amount: {{ $room->price }},
                    currency: 'usd',
                    room_id: document.getElementById('room_id').value,
                    is_gateway: 1
                }),
            });

            const data = await response.json();

            if (data.error) {
                alert(data.error);
                payBtn.disabled = false;
                payBtn.textContent = 'Pay Now';
                return;
            }

            const clientSecret = data.clientSecret;

            // Step 2: Confirm payment
            const result = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: document.getElementById('name').value
                    }
                }
            });

            if (result.error) {
                alert(result.error.message);
                payBtn.disabled = false;
                payBtn.textContent = 'Pay Now';
            } else if (result.paymentIntent && result.paymentIntent.status === 'succeeded') {
                // Step 3: Call /rooms/book API to make reservation
                const reservationResponse = await fetch('/rooms/book', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        room_id: document.getElementById('room_id').value,
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        check_in: document.getElementById('check_in').value,
                        check_out: document.getElementById('check_out').value,
                        guests: document.getElementById('guests').value,
                        is_gateway: 1
                    })
                });

                const reservationData = await reservationResponse.json();
                const reservationId = reservationData.reservation_id ?? '';

                window.location.href = `/stripe/success?room_id={{ $room->id }}&reservation_id=${reservationId}`;
            } else {
                alert("Payment failed. Please try again.");
                payBtn.disabled = false;
                payBtn.textContent = 'Pay Now';
            }
        });


    </script>
@endsection
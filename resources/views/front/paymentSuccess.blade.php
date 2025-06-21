@extends('layouts.app')

@section('content')
<div class="uk-section uk-section-default uk-flex uk-flex-middle uk-animation-fade" style="min-height: 80vh;">
    <div class="uk-container">
        <div class="uk-flex uk-flex-center">
            <div class="success-container">
                <div class="uk-text-center">
                    <i class="fas fa-check-circle text-success" style="font-size: 5rem; color: #28a745;"></i>
                    <h2 class="uk-margin-top">Payment Successful</h2>

                    @if($room)
                        <p class="uk-text-lead uk-margin-small-top">You have successfully booked a <strong>{{ $room->room_type }}</strong> room.</p>
                        <p class="uk-text-muted">Rate: <strong>RM {{ number_format($room->price, 2) }}</strong> per night</p>
                        <p class="uk-margin-small-top">{{ $room->detail->short_description ?? 'Enjoy your stay with us!' }}</p>
                    @else
                        <p class="uk-text-lead uk-margin-small-top">Thank you for your payment. Your reservation is confirmed.</p>
                    @endif

                    <a href="{{ url('/') }}" class="uk-button uk-button-primary uk-margin-top">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .success-container {
            max-width: 600px;
            padding: 3rem 2rem;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .text-success {
            color: #28a745;
        }
        .uk-text-lead {
            font-size: 1.25rem;
            font-weight: 500;
        }
        .uk-button-primary {
            background: linear-gradient(135deg, #1e87f0, #007bff);
            border: none;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.6rem 2rem;
        }
        .uk-button-primary:hover {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }
    </style>
@endsection

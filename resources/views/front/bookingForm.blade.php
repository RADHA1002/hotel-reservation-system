@php
    $rooms = DB::table('rooms')->where('available', 1)->get();
    $today = date('Y-m-d');
@endphp
<style>
    .impx-hp-booking-form .uk-form-icon {
        margin-top: unset;
    }
</style>
<!-- BOOKING FORM -->
<div class="uk-padding bg-color-aqua pattern-1">
    <div class="uk-container">

        <div class="uk-flex uk-flex-center" data-uk-grid>
            <div class="uk-width-1-1">
                <div class="impx-hp-booking-form hp2 no-margin">
                    <h6 class="uk-heading-line uk-text-center impx-text-white uk-text-uppercase"><span>Booking Form</span></h6>

                    <form action="{{ route('rooms.book') }}" method="POST" id="bookingForm" data-uk-grid class="uk-grid-small uk-child-width-1-3@m uk-child-width-1-1@s uk-grid-match">
                        @csrf

                        @if(session('success'))
                            <script>$.notify("{{ session('success') }}", "success");</script>
                        @endif
                        @if(session('error'))
                            <script>$.notify("{{ session('error') }}", "error");</script>
                        @endif

                        <!-- Full Name -->
                        <div>
                            <label class="uk-form-label">Full Name</label>
                            <div class="uk-form-controls uk-inline">
                                <span class="uk-form-icon" data-uk-icon="icon: user"></span>
                                <input class="uk-input uk-border-rounded" type="text" name="name" required placeholder="Full Name">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="uk-form-label">Email</label>
                            <div class="uk-form-controls uk-inline">
                                <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                                <input class="uk-input uk-border-rounded" type="email" name="email" placeholder="your Email">
                            </div>
                        </div>

                        <!-- Arrival -->
                        <div>
                            <label class="uk-form-label">Arrival</label>
                            <div class="uk-form-controls uk-inline">
                                <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                <input class="uk-input uk-border-rounded" type="date" name="check_in" min="{{ $today }}" required>
                            </div>
                        </div>

                        <!-- Departure -->
                        <div>
                            <label class="uk-form-label">Departure Date</label>
                            <div class="uk-form-controls uk-inline">
                                <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                <input class="uk-input uk-border-rounded" type="date" name="check_out" min="{{ $today }}" required>
                            </div>
                        </div>

                        <!-- Guests -->
                        <div>
                            <label class="uk-form-label">Guests</label>
                            <div class="uk-form-controls uk-position-relative">
                                <span class="uk-form-icon" data-uk-icon="icon: users"></span>
                                <select class="uk-select uk-border-rounded" name="guests">
                                    <option value="">Please select...</option>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Rooms -->
                        <div>
                            <label class="uk-form-label">Rooms</label>
                            <div class="uk-form-controls uk-position-relative">
                                <span class="uk-form-icon" data-uk-icon="icon: users"></span>
                                <select class="uk-select uk-border-rounded" name="room_id">
                                    <option value="">Please select...</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Book Button (Spans full width on small, 1/3 on medium+) -->
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <label class="uk-form-label empty-label">&nbsp;</label>
                            <button type="submit" class="uk-button uk-button-primary uk-width-1-1" id="bookButton">Book Now</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- BOOKING FORM END -->

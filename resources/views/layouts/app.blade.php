<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Milky - Hotel &amp; Resort HTML Template</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
       	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
       	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}" />
        <!-- Removed local Font Awesome to avoid version conflict -->
        <link rel="stylesheet" href="{{asset('css/tiny-date-picker.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/media-query.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.css">
        <!-- Font Awesome 5.15.4 CDN for 'fas' icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyZ88n1VtE94GvGzlz/vj70eLP3CdeXSu3Q+cRovW1UWLgbz3JOY2zP+6Xj6PlC6B1V9MJmA09Yjz9xuR+8fOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .notifyjs-corner {
                z-index: 9999 !important;
            }
            .notifyjs-bootstrap-base {
                margin: 10px 10px 0 0 !important;
            }
            .notifyjs-bootstrap-success {
                background-color: #28a745;
                color: white;
            }
            .notifyjs-bootstrap-error {
                background-color: #dc3545;
                color: white;
            }
        </style>
    </head>

    <body class="impx-body" id="top">
		@include('front/header')
        
		@yield('content')

		<!-- FOOTER -->
		@include('front/footer')
		<!-- FOOTER END -->

    	<!-- Javascript -->
    	<script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/uikit.min.js')}}"></script>
        <script src="{{asset('js/uikit-icons.min.js')}}"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBGb3xrNtz335X4G2KfoOXb-XuIyHAzlVo"></script>
        <script src="{{asset('js/jquery.gmap.min.js')}}"></script>
        <script src="{{asset('js/jquery.parallax.min.js')}}"></script>
        <script src="{{asset('js/tiny-date-picker.min.js')}}"></script>
        <script src="{{asset('js/date-config.js')}}"></script>
        <script src="{{asset('js/template-config.js')}}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#bookingForm').on('submit', function(e) {
                    e.preventDefault();
                    
                    // Disable button to prevent multiple submissions
                    $('#bookButton').prop('disabled', true);
                    $('#bookButton').html('Booking...');
                    
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $.notify("Booking successful!", "success");
                            $('#bookingForm')[0].reset();
                        },
                        error: function(xhr, status, error) {
                            $.notify("Booking failed: " + error, "error");
                        },
                        complete: function() {
                            // Re-enable button
                            $('#bookButton').prop('disabled', false);
                            $('#bookButton').html('Book Now');
                        }
                    });
                });
            });

            function toggleSearchBar(event) {
                if (event) event.preventDefault();
                const search = document.getElementById('fullscreen-search');
                search.style.display = (search.style.display === 'none' || !search.style.display) ? 'flex' : 'none';
                document.getElementById('search-input').focus();
            }

            // Close on ESC
            document.addEventListener('keydown', function (e) {
                if (e.key === "Escape") {
                    document.getElementById('fullscreen-search').style.display = 'none';
                }
            });

            // AJAX search logic
            document.getElementById('search-input').addEventListener('input', function () {
                const query = this.value;
                const resultsDiv = document.getElementById('search-results');
                if (query.length < 2) {
                    resultsDiv.innerHTML = '';
                    return;
                }

                fetch(`{{ url('/search') }}?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsDiv.innerHTML = '';
                        if (data.length === 0) {
                            resultsDiv.innerHTML = '<p class="uk-text-muted">No rooms found.</p>';
                        } else {
                            data.forEach(room => {
                                const roomLink = document.createElement('a');
                                roomLink.href = `/rooms/${room.id}`;
                                roomLink.className = 'uk-card uk-card-default uk-card-body uk-margin-small-bottom uk-display-block';
                                roomLink.innerHTML = `<strong>${room.room_type}</strong><br><span class="uk-text-muted">${room.description?.substring(0, 100)}...</span>`;
                                resultsDiv.appendChild(roomLink);
                            });
                        }
                    });
            });
        </script>
        @yield('scripts')
    </body>
</html>

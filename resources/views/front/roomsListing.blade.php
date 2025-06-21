<div class="uk-position-relative impx-section-rooms bg1 uk-position-relative uk-background-fixed uk-background-center-center uk-height-1-1">
    <div class="impx-overlay"></div>

    <div class="uk-container">
        <div class="uk-position-relative uk-visible-toggle">
            <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-collapse uk-box-shadow-large uk-grid-match impx-rooms-grid" data-uk-grid>
            @foreach ($rooms as $room)
            @php
                $groupIndex = floor($loop->index / 2);
                $imageLeft = $groupIndex % 2 === 0;
            @endphp

            <li>
                <div class="impx-room-item medium">
                    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s" data-uk-grid>
                        
                        {{-- If image should be on the left --}}
                        @if ($imageLeft)
                            <div class="uk-card-media-left uk-cover-container uk-position-relative">
                                <canvas width="290" height="180"></canvas>
                                <img src="{{ $room->image }}" alt="{{ $room->room_type }}" data-uk-cover>
                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                            </div>
                        @endif

                        <div class="uk-card-body uk-position-relative impx-padding-medium">
                            <div class="uk-card-header uk-padding-remove-horizontal">
                                <h4 class="uk-card-title uk-margin-remove-bottom">{{ $room->room_type }}</h4>
                                <p class="uk-text-meta uk-margin-remove-top">Capacity: {{ $room->capacity }} guests</p>
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

                        {{-- If image should be on the right --}}
                        @if (! $imageLeft)
                            <div class="uk-card-media-right uk-cover-container uk-position-relative">
                                <canvas width="290" height="180"></canvas>
                                <img src="{{ $room->image }}" alt="{{ $room->room_type }}" data-uk-cover>
                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                            </div>
                        @endif

                    </div>
                </div>
            </li>
        @endforeach
            </ul>
        </div>
    </div>

</div>
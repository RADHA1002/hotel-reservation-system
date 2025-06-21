<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roomTypes = [
            'deluxe_king_room' => [
                'banner' => 'images/rooms/deluxe_king_banner.jpg',
                'images' => [
                    'images/rooms/deluxe_king_1.jpg',
                    'images/rooms/deluxe_king_2.jpg',
                    'images/rooms/deluxe_king_3.jpg',
                    'images/rooms/deluxe_king_4.jpg',
                ],
                'description' => 'Our Deluxe King Room offers a spacious retreat with a plush king-size bed, elegant furnishings, and modern amenities. Enjoy stunning city views, a comfortable seating area, and a luxurious marble bathroom with premium toiletries. Perfect for both business and leisure travelers seeking comfort and style.'
            ],
            'deluxe_twin_room' => [
                'banner' => 'images/rooms/deluxe_twin_banner.jpg',
                'images' => [
                    'images/rooms/deluxe_twin_1.jpg',
                    'images/rooms/deluxe_twin_2.jpg',
                    'images/rooms/deluxe_twin_3.jpg',
                    'images/rooms/deluxe_twin_4.jpg',
                ],
                'description' => 'The Deluxe Twin Room features two comfortable twin beds, ideal for friends or colleagues traveling together. The room includes a work desk, high-speed internet, and a modern en-suite bathroom. Enjoy the perfect blend of comfort and functionality during your stay.'
            ],
            'executive_suite' => [
                'banner' => 'images/rooms/executive_suite_banner.jpg',
                'images' => [
                    'images/rooms/executive_suite_1.jpg',
                    'images/rooms/executive_suite_2.jpg',
                    'images/rooms/executive_suite_3.jpg',
                    'images/rooms/executive_suite_4.jpg',
                ],
                'description' => 'The Executive Suite offers a separate living area and bedroom, providing ample space for both work and relaxation. Enjoy premium amenities, a spacious work desk, and stunning city views. This suite is perfect for business travelers or those seeking extra space and comfort.'
            ],
            'family_suite' => [
                'banner' => 'images/rooms/family_suite_banner.jpg',
                'images' => [
                    'images/rooms/family_suite_1.jpg',
                    'images/rooms/family_suite_2.jpg',
                    'images/rooms/family_suite_3.jpg',
                    'images/rooms/family_suite_4.jpg',
                ],
                'description' => 'Our Family Suite is designed with families in mind, featuring a separate bedroom with a king-size bed and a living area with a sofa bed. The suite includes a mini-fridge, microwave, and plenty of space for the whole family to relax and enjoy their stay.'
            ],
            'presidential_suite' => [
                'banner' => 'images/rooms/presidential_suite_banner.jpg',
                'images' => [
                    'images/rooms/presidential_suite_1.jpg',
                    'images/rooms/presidential_suite_2.jpg',
                    'images/rooms/presidential_suite_3.jpg',
                    'images/rooms/presidential_suite_4.jpg',
                ],
                'description' => 'Experience the epitome of luxury in our Presidential Suite. This expansive suite features a separate living room, dining area, and a master bedroom with a king-size bed. Enjoy premium amenities, a spacious marble bathroom with a soaking tub, and breathtaking panoramic views of the city.'
            ],
            'standard_queen_room' => [
                'banner' => 'images/rooms/standard_queen_banner.jpg',
                'images' => [
                    'images/rooms/standard_queen_1.jpg',
                    'images/rooms/standard_queen_2.jpg',
                    'images/rooms/standard_queen_3.jpg',
                    'images/rooms/standard_queen_4.jpg',
                ],
                'description' => 'Our Standard Queen Room offers comfortable accommodations with a queen-size bed, perfect for solo travelers or couples. The room features a work desk, free Wi-Fi, and a modern bathroom with complimentary toiletries. Enjoy a restful stay in this cozy and well-appointed room.'
            ],
            'standard_twin_room' => [
                'banner' => 'images/rooms/standard_twin_banner.jpg',
                'images' => [
                    'images/rooms/standard_twin_1.jpg',
                    'images/rooms/standard_twin_2.jpg',
                    'images/rooms/standard_twin_3.jpg',
                    'images/rooms/standard_twin_4.jpg',
                ],
                'description' => 'The Standard Twin Room features two comfortable twin beds, ideal for friends or colleagues traveling together. The room includes a work desk, free Wi-Fi, and a modern bathroom with complimentary toiletries. Enjoy a comfortable and convenient stay in this well-appointed room.'
            ],
            'junior_suite' => [
                'banner' => 'images/rooms/junior_suite_banner.jpg',
                'images' => [
                    'images/rooms/junior_suite_1.jpg',
                    'images/rooms/junior_suite_2.jpg',
                    'images/rooms/junior_suite_3.jpg',
                    'images/rooms/junior_suite_4.jpg',
                ],
                'description' => 'The Junior Suite offers a spacious living area and a separate bedroom with a king-size bed. Enjoy premium amenities, a comfortable seating area, and a luxurious marble bathroom. Perfect for travelers seeking extra space and comfort during their stay.'
            ],
            'honeymoon_suite' => [
                'banner' => 'images/rooms/honeymoon_suite_banner.jpg',
                'images' => [
                    'images/rooms/honeymoon_suite_1.jpg',
                    'images/rooms/honeymoon_suite_2.jpg',
                    'images/rooms/honeymoon_suite_3.jpg',
                    'images/rooms/honeymoon_suite_4.jpg',
                ],
                'description' => 'Celebrate your love in our romantic Honeymoon Suite, featuring a king-size canopy bed, a spacious living area, and a luxurious marble bathroom with a deep soaking tub. Enjoy special amenities including champagne upon arrival, rose petal turndown service, and breathtaking views to create unforgettable memories.'
            ],
            'accessible_deluxe_room' => [
                'banner' => 'images/rooms/accessible_deluxe_banner.jpg',
                'images' => [
                    'images/rooms/accessible_deluxe_1.jpg',
                    'images/rooms/accessible_deluxe_2.jpg',
                    'images/rooms/accessible_deluxe_3.jpg',
                    'images/rooms/accessible_deluxe_4.jpg',
                ],
                'description' => 'Our Accessible Deluxe Room is designed for guests with mobility needs, featuring wider doorways, grab bars in the bathroom, and a roll-in shower. The room includes a king-size bed, a comfortable seating area, and all the amenities needed for a comfortable and accessible stay.'
            ],
        ];

        // Get the room type from the room relationship
        $room = \App\Models\Room::find($this->faker->randomElement(\App\Models\Room::pluck('id')->toArray()));
        $roomTypeKey = strtolower(str_replace(' ', '_', $room->room_type));
        
        // If room type not found in our array, use a default
        if (!isset($roomTypes[$roomTypeKey])) {
            $roomTypeKey = 'deluxe_king_room';
        }
        
        $roomDetails = $roomTypes[$roomTypeKey];
        
        return [
            'room_id' => $room->id,
            'banner_image' => $roomDetails['banner'],
            'image_1' => $roomDetails['images'][0],
            'image_2' => $roomDetails['images'][1],
            'image_3' => $roomDetails['images'][2],
            'image_4' => $roomDetails['images'][3],
            'long_description' => $roomDetails['description'] . "\n\nRoom Amenities:\n" . 
                "• Air conditioning with individual climate control\n" .
                "• 55-inch flat-screen HDTV with premium channels\n" .
                "• High-speed Wi-Fi access\n" .
                "• In-room safe (laptop size)\n" .
                "• Minibar with refreshments\n" .
                "• Coffee/tea making facilities\n" .
                "• Iron and ironing board\n" .
                "• Hairdryer\n" .
                "• Bathrobes and slippers\n" .
                "• Premium toiletries\n" .
                "• Work desk with ergonomic chair\n" .
                "• USB charging ports\n" .
                "• 24-hour room service\n" .
                "• Daily housekeeping\n" .
                "• Wake-up call service",
        ];
    }
}

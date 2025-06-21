<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\RoomDetail;
use App\Models\Hotel;

class RealRoomDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks to avoid constraint violations
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Truncate the tables
        Room::truncate();
        RoomDetail::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Get or create a default hotel
        $hotel = Hotel::first();
        if (!$hotel) {
            $hotel = Hotel::create([
                'name' => 'Grand Horizon Hotel',
                'address' => 'Jalan imam,81310 skudai, Johor  Darul Ta’zim',
                'description' => 'Experience unparalleled luxury at Grand Horizon Hotel, where comfort meets elegance in the heart of the city.',
                'stars' => 5,
            ]);
        }
        
        // Define 6 rooms total: 2 Single, 2 Deluxe, and 2 Family rooms
        $roomTypes = [
            // Single Rooms
            [
                'room_type' => 'Single Room - City View',
                'price' => 129,
                'capacity' => 1,
                'image' => 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=800&width=800',
            ],
            [
                'room_type' => 'Single Room - Garden View',
                'price' => 149,
                'capacity' => 1,
                'image' => 'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-1.jpeg',
            ],
            // Deluxe Rooms
            [
                'room_type' => 'Deluxe Double Room',
                'price' => 229,
                'capacity' => 2,
                'image' => 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg',
            ],
            [
                'room_type' => 'Deluxe Twin Room',
                'price' => 249,
                'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1631049552057-403cdb8f0658?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
            ],
            // Family Rooms
            [
                'room_type' => 'Family Room - 2 Adults',
                'price' => 349,
                'capacity' => 4,
                'image' => 'https://images.unsplash.com/photo-1582719471384-894e8d76b9d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
            ],
            [
                'room_type' => 'Family Suite - 2 Adults + 2 Children',
                'price' => 399,
                'capacity' => 4,
                'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
            ],
        ];
        
        // Create 2 rooms of each type
        foreach ($roomTypes as $roomType) {
            for ($i = 1; $i <= 2; $i++) {
                $roomNumber = strtoupper(substr(str_replace(' ', '', $roomType['room_type']), 0, 3)) . $i;
                
                $room = Room::create([
                    'hotel_id' => $hotel->id,
                    'room_type' => $roomType['room_type'],
                    'price' => $this->addPriceVariation($roomType['price']),
                    'capacity' => $roomType['capacity'],
                    'available' => rand(0, 100) > 15, // 85% chance of being available
                    'image' => $roomType['image'],
                    'room_number' => $roomNumber,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
                // Create room details
                $this->createRoomDetails($room);
            }
        }
    }
    
    /**
     * Add some random variation to the base price
     */
    private function addPriceVariation($basePrice)
    {
        // Add or subtract up to 10% of the base price
        $variation = $basePrice * (rand(-10, 10) / 100);
        return round($basePrice + $variation, 2);
    }
    
    /**
     * Create room details for a room
     */
    private function createRoomDetails($room)
    {
        $roomTypeKey = strtolower(str_replace(' ', '_', $room->room_type));
        
        // Define room details for each room type
        $roomDetails = [
            'single_room_-_city_view' => [
                'banner' => 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=800&width=800',
                'images' => [
                    'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=800&width=800',
                    'https://www.gannett-cdn.com/authoring/2019/07/30/NJES/ghk-073019-luxury-hotel-3.jpg',
                    'https://www.gannett-cdn.com/authoring/2019/07/30/NJES/ghk-073019-luxury-hotel-4.jpg',
                    'https://www.gannett-cdn.com/authoring/2019/07/30/NJES/ghk-073019-luxury-hotel-5.jpg',
                ],
                'description' => 'Our Single Room with City View offers a cozy retreat with modern amenities. Enjoy a comfortable single bed, work desk, and a well-appointed bathroom. The large windows provide stunning views of the city skyline.'
            ],
            'single_room_-_garden_view' => [
                'banner' => 'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-1.jpeg',
                'images' => [
                    'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-1.jpeg',
                    'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-2.jpeg',
                    'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-3.jpeg',
                    'https://www.decorilla.com/online-decorating/wp-content/uploads/2021/05/Luxury-hotel-interior-design-on-the-water-4.jpeg',
                ],
                'description' => 'The Single Room with Garden View offers a peaceful retreat overlooking our beautiful gardens. Features a comfortable single bed, work area, and modern en-suite bathroom. Perfect for solo travelers seeking tranquility.'
            ],
            'deluxe_double_room' => [
                'banner' => 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg',
                'images' => [
                    'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg',
                    'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-2.jpg',
                    'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bathroom.jpg',
                    'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-suite.jpg',
                ],
                'description' => 'Our Deluxe Double Room features a king-size bed with premium linens, a spacious work area, and elegant decor. The en-suite bathroom includes a rainfall shower and luxury toiletries. Perfect for couples or business travelers.'
            ],
            'deluxe_twin_room' => [
                'banner' => 'https://www.hospitalitynet.org/picture/xxl_153098435.jpg',
                'images' => [
                    'https://www.hospitalitynet.org/picture/xxl_153098435.jpg',
                    'https://www.hospitalitynet.org/picture/xxl_153098436.jpg',
                    'https://www.hospitalitynet.org/picture/xxl_153098437.jpg',
                    'https://www.hospitalitynet.org/picture/xxl_153098438.jpg',
                ],
                'description' => 'The Deluxe Twin Room features two comfortable single beds, perfect for friends or colleagues traveling together. The room includes a work desk, high-speed internet, and a modern en-suite bathroom with premium amenities.'
            ],
            'family_room' => [
                'banner' => 'https://www.marriott.com/content/dam/marriott-renditions/HKGHW/hkghw-deluxe-king-0001-hor-clsc.jpg',
                'images' => [
                    'https://www.marriott.com/content/dam/marriott-renditions/HKGHW/hkghw-deluxe-king-0001-hor-clsc.jpg',
                    'https://www.marriott.com/content/dam/marriott-renditions/HKGHW/hkghw-deluxe-king-0002-hor-clsc.jpg',
                    'https://www.marriott.com/content/dam/marriott-renditions/HKGHW/hkghw-deluxe-king-0003-hor-clsc.jpg',
                    'https://www.marriott.com/content/dam/marriott-renditions/HKGHW/hkghw-deluxe-king-0004-hor-clsc.jpg',
                ],
                'description' => 'Our Family Room is perfect for families, featuring a king-size bed and a sofa bed. The room includes a mini-fridge, microwave, and plenty of space for everyone to relax. Kids will love the special welcome amenities we provide.'
            ],
            'family_room_with_view' => [
                'banner' => 'https://www.gannett-cdn.com/authoring/2018/12/31/NCCM/ghk-123118-luxury-hotel-5.jpg',
                'images' => [
                    'https://www.gannett-cdn.com/authoring/2018/12/31/NCCM/ghk-123118-luxury-hotel-5.jpg',
                    'https://www.gannett-cdn.com/authoring/2018/12/31/NCCM/ghk-123118-luxury-hotel-4.jpg',
                    'https://www.gannett-cdn.com/authoring/2018/12/31/NCCM/ghk-123118-luxury-hotel-3.jpg',
                    'https://www.gannett-cdn.com/authoring/2018/12/31/NCCM/ghk-123118-luxury-hotel-2.jpg',
                ],
                'description' => 'The Family Room with View offers stunning city or garden views from large windows. Features a king-size bed and two single beds, a spacious seating area, and a modern bathroom. Perfect for families looking for comfort and space.'
            ]
        ];
        
        // If room type not found, use deluxe king as default
        if (!isset($roomDetails[$roomTypeKey])) {
            $roomTypeKey = 'deluxe_king_room';
        }
        
        $details = $roomDetails[$roomTypeKey];
        
        // Create room details
        RoomDetail::create([
            'room_id' => $room->id,
            'banner_image' => $details['banner'],
            'image_1' => $details['images'][0],
            'image_2' => $details['images'][1],
            'image_3' => $details['images'][2],
            'image_4' => $details['images'][3],
            'long_description' => $details['description'] . "\n\nRoom Amenities:\n" . 
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
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

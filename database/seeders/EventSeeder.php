<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Category;

class EventSeeder extends Seeder
{
    public function run()
    {
        $halfMarathon = Category::where('name', 'Half Marathon')->first();
        $marathon = Category::where('name', 'Marathon')->first();
        $fiveK = Category::where('name', '5K')->first();
        $crossCountry = Category::where('name', 'Cross Country')->first();
        $ultras = Category::where('name', 'Ultras')->first();
        $triathlons = Category::where('name', 'Triathlons')->first();
        $adventureRaces = Category::where('name', 'Adventure Races')->first();

        Event::create([
            'title' => 'Holloway Memorial Cross Country Races',
            'description' => 'The Holloway Memorial Cross Country Races will be hosted by the Sumner Running Club at Motukarara Race Course on 8 June 2024. With a fast, flat start on the racecourse itself, the course makes its way around the birdcage and past the stables before emerging to skirt the perimeter of the paddock next to Duck Pond Rd. It then curves around the base of the knoll before rising up to a sharp right hairpin and a climb to the top of the hill. The run across the top gives you outstanding 360° views before dropping right and descending through the wood to the flat again to begin your next lap. Each lap is approximately 2km with your last diverting off slightly early to allow your sprint to the finish line in front of the Grandstand. Entry to this event is open to all runners; both those registered with a club, and unregistered runners. The race distance depends on your age grade.',
            'dateTime' => '2024-06-08 00:00:00',
            'duration' => 120,
            'location' => 'Motukarara Race Course',
            'maximum_tickets' => 100,
            'price' => 20.00,
            'category_id' => 1
        ]);

        Event::create([
            'title' => 'Eastern BOP Triathlon Club Monthly Du',
            'description' => 'Eastern BOP Triathlon & Multisport Club\'s event on 2 June 2024 is part of a series of Triathlons and Duathlons held on the first Sunday of every month.<br>
            This month\'s event is a Duathlon with short and long course options for adults and kids 11 yrs+.<br>
            Based at Port Ōhope, the course starts and finishes at the eastern end of Harbour Road in the reserve opposite the Ōhope Golf Club.<br>
            The Triathlon season is held during summer (Nov - April). The Duathlon season is held during winter (May - October)',
            'dateTime' => '2024-06-02 00:00:00',
            'duration' => 120,
            'location' => 'Port Ōhope',
            'maximum_tickets' => 150,
            'price' => 25.00,
            'category_id' => $crossCountry->id,
        ]);

        Event::create([
            'title' => 'Night Cross',
            'description' => 'The Night Cross on 1 June 2024 is a 5.5km, multi-lap, Cross Country event held under lights at McFetridge Park in Hillcrest, Auckland.<br>
            The course is mostly flat, with some undulations each lap. There will be seeded races throughout the evening to ensure everyone runs with people of their ability.<br>
            Prize money is on offer for the fastest men and women around the course, and spot prizes from sponsors for all races.',
            'dateTime' => '2024-06-01 00:00:00',
            'duration' => 90,
            'location' => 'McFetridge Park, Hillcrest, Auckland',
            'maximum_tickets' => 200,
            'price' => 15.00,
            'category_id' => $halfMarathon->id,
        ]);

        Event::create([
            'title' => 'Scarecrow Scamper Cross Country',
            'description' => 'The Scarecrow Scamper Cross Country on 8 June 2024 is at Martin and Jill Bonny’s farm in Tapawera, about 50km/40 minutes drive from Richmond.<br>
            This is a traditional rural X-country experience with 3.5km laps that will take you through private farmland, gentle hills and quite possibly some mud! All ages and abilities of runners and walkers are welcome.<br>
            There is a shorter 1.7km ‘Rascal Romp’ course for the children. Registration is on the farm at the barn from 1pm with the event briefing at 1:45pm. Walkers start at 1:45pm, all Runners start at 2pm.<br>
            This event is free to everyone, but participants are encouraged to join the Waimea Harrier club, as this is a race in their Winter Programme.',
            'dateTime' => '2024-06-08 00:00:00',
            'duration' => 120,
            'location' => 'Martin and Jill Bonny’s farm, Tapawera',
            'maximum_tickets' => 150,
            'price' => 0.00,
            'category_id' => 1
        ]);

        Event::create([
            'title' => 'The Possum Night Trail Run',
            'description' => 'The Possum is a trail night run on the shortest day and darkest night on 15 June 2024 at Wairakei Resort, Taupō.<br>
            Experience the Wairakei Resort, Craters Mountain Bike Park, and Craters of the Moon Geothermal Walkway at night. Running or walking at night is awesome and the trails lined up for you are super fun. The Craters of the Moon geothermal walkway is a real treat where you get to run or walk through a geothermal wonderland. There will be steam from the ground and probably steam from your body as you take on the ups and downs, gulleys, ridges and bridges. <br>
            Reflective course markings will light the path to follow and marshals at key locations will keep you on course and provide lots of encouragement.<br>
            After the big night out, grab some dinner from the menu offered by the Wairakei Resort and soak in a geothermal hot pool to warm up and relax.',
            'dateTime' => '2024-06-15 00:00:00',
            'duration' => 180,
            'location' => 'Wairakei Resort, Taupō',
            'maximum_tickets' => 300,
            'price' => 30.00,
            'category_id' => $marathon->id,
        ]);

        Event::create([
            'title' => 'Kirikiriroa Marathon',
            'description' => 'The Kirikiriroa Marathon is back on 9 June 2024 in Hamilton, New Zealand.<br>
            Starting at the Hamilton gardens, runners/walkers proceed along the Te Awa River Ride to Tamahere and then back to the gardens then out along the Te Awa River Ride out to Pukete near the horse farm, then return along the same path back to the gardens to the finish. This is a similar undulating course to previous years.<br>
            Compete the 42.2km distance solo or in a relay team of 3 (Leg 1: 14.5km, Leg 2: 7.8km, Leg 3: 20km).<br>
            Marathon walkers are welcome. The purpose of this event is to encourage everyone to participate and finish, whether walking, running, or a combination of both.',
            'dateTime' => '2024-06-09 00:00:00',
            'duration' => 240,
            'location' => 'Hamilton Gardens, Hamilton',
            'maximum_tickets' => 500,
            'price' => 40.00,
            'category_id' => $fiveK->id,
        ]);

        Event::create([
            'title' => 'Holloway Memorial Cross Country Races',
            'description' => 'The Holloway Memorial Cross Country Races will be hosted by the Sumner Running Club at Motukarara Race Course on 8 June 2024. With a fast, flat start on the racecourse itself, the course makes its way around the birdcage and past the stables before emerging to skirt the perimeter of the paddock next to Duck Pond Rd. It then curves around the base of the knoll before rising up to a sharp right hairpin and a climb to the top of the hill. The run across the top gives you outstanding 360° views before dropping right and descending through the wood to the flat again to begin your next lap. Each lap is approximately 2km with your last diverting off slightly early to allow your sprint to the finish line in front of the Grandstand. Entry to this event is open to all runners; both those registered with a club, and unregistered runners. The race distance depends on your age grade.',
            'dateTime' => '2024-06-08 00:00:00',
            'duration' => 120,
            'location' => 'Motukarara Race Course',
            'maximum_tickets' => 100,
            'price' => 20.00,
            'category_id' => $crossCountry->id,
        ]);

        Event::create([
            'title' => 'City Half Marathon',
            'description' => 'Join us for the annual City Half Marathon, a scenic 21.1 km race through the heart of downtown, taking you past iconic landmarks and along the riverfront. Suitable for runners of all levels, the event promises a day of fun, fitness, and community spirit.',
            'dateTime' => '2024-06-15 07:00:00',
            'duration' => 150,
            'location' => 'Downtown Riverfront',
            'maximum_tickets' => 1500,
            'price' => 45.00,
            'category_id' => $halfMarathon->id,
        ]);

        Event::create([
            'title' => 'Spring Marathon',
            'description' => 'Experience the ultimate marathon challenge with the Spring Marathon. This 42.2 km race takes runners through a mix of urban and natural landscapes, ending with a celebration at the city park. All participants receive a medal and a finisher\'s T-shirt.',
            'dateTime' => '2024-07-01 06:00:00',
            'duration' => 240,
            'location' => 'City Park',
            'maximum_tickets' => 2000,
            'price' => 60.00,
            'category_id' => $marathon->id,
        ]);

        Event::create([
            'title' => 'Beachside 5K Fun Run',
            'description' => 'A fun and friendly 5K run along the beautiful beachside. Perfect for families, beginners, and seasoned runners looking to enjoy a short, scenic run. Refreshments and entertainment will be provided at the finish line.',
            'dateTime' => '2024-08-10 09:00:00',
            'duration' => 60,
            'location' => 'Beachside Promenade',
            'maximum_tickets' => 800,
            'price' => 25.00,
            'category_id' => $fiveK->id,
        ]);

        Event::create([
            'title' => 'Ultra Mountain Challenge',
            'description' => 'Test your limits with the Ultra Mountain Challenge, an extreme ultra race through rugged mountain terrain. This 100 km race is designed for experienced ultra runners looking for the next big adventure.',
            'dateTime' => '2024-10-20 05:00:00',
            'duration' => 600,
            'location' => 'Mountain Range',
            'maximum_tickets' => 200,
            'price' => 100.00,
            'category_id' => $ultras->id,
        ]);

        Event::create([
            'title' => 'Lakeside Triathlon',
            'description' => 'Compete in the Lakeside Triathlon, featuring a swim in the crystal-clear lake, a bike ride through scenic routes, and a run along the lakeshore. This event is perfect for triathletes of all levels.',
            'dateTime' => '2024-11-15 07:30:00',
            'duration' => 300,
            'location' => 'Lakeside Resort',
            'maximum_tickets' => 600,
            'price' => 75.00,
            'category_id' => $triathlons->id,
        ]);

        Event::create([
            'title' => 'Winter Adventure Race',
            'description' => 'Join the Winter Adventure Race, a thrilling event that combines running, climbing, and navigation through the snowy wilderness. Teams of two or more will compete to see who can complete the course the fastest.',
            'dateTime' => '2024-12-05 06:00:00',
            'duration' => 480,
            'location' => 'National Park',
            'maximum_tickets' => 300,
            'price' => 50.00,
            'category_id' => $adventureRaces->id,
        ]);

    }
}

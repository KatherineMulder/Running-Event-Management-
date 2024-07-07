@include('layouts.header')
@include('layouts.navbar')

<div class="text-center py-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <h2>Plan and manage your running events with ease</h2>
        <p class="text-center fs-4 text-capitalize fw-bolder ">Click the more button to start your journey</p>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/crossCountry.jpg') }}" class="card-img-top img-fluid" alt="Event Image 1">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start">Holloway Memorial Cross Country Races</h5>
                    <p class="card-text fs-4 text-start">The Holloway Memorial Cross Country Races will be hosted by the Sumner Running Club at Motukarara Race Course on 8 June 2024.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/easternRun.jpg') }}" class="card-img-top img-fluid" alt="Event Image 2">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start">Eastern BOP Triathlon Club Monthly Du</h5>
                    <p class="card-text fs-4 text-start">Eastern BOP Triathlon & Multisport Club's event on 2 June 2024 is part of a series of Triathlons and Duathlons held on the first Sunday of every month.
                    This month's event is a Duathlon with short and long course options for adults and kids 11 yrs+.<br>
                    Based at Port Ōhope, the course starts and finishes at the eastern.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/nightCross.jpg') }}" class="card-img-top img-fluid" alt="Event Image 3">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start">Night Cross</h5>
                    <p class="card-text fs-4 text-start">The Night Cross on 1 June 2024 is a 5.5km, multi-lap, Cross Country event held under lights at McFetridge Park in Hillcrest, Auckland.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/scamper.jpg') }}" class="card-img-top img-fluid" alt="Event Image 1">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start">Scarecrow Scamper Cross Country</h5>
                    <p class="card-text fs-4 text-start">The Scarecrow Scamper Cross Country on 8 June 2024 is at Martin and Jill Bonny’s farm in Tapawera, about 50km/40 minutes drive from Richmond.
                    This is a traditional rural X-country experience with 3.5km laps that will take you through private farmland, gentle hills and quite possibly some mud! 
                    
                </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/nightRun.jpg') }}" class="card-img-top img-fluid" alt="Event Image 2">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start">The Possum Night Trail Run</h5>
                    <p class="card-text fs-4 text-start">The Possum is a trail night run on the shortest day and darkest night on 15 June 2024 at Wairakei Resort, Taupō.
                    Experience the Wairakei Resort, Craters Mountain Bike Park, and Craters of the Moon Geothermal Walkway at night. Running or walking at night is awesome and the trails lined up for you are super fun.
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0">
                <img src="{{ asset('images/marathon.jpg') }}" class="card-img-top img-fluid" alt="Event Image 3">
                <div class="card-body">
                    <h5 class="card-title fs-3 text-start ">Kirikiriroa Marathon</h5>
                    <p class="card-text fs-4 text-start">The Kirikiriroa Marathon is back on 9 June 2024 in Hamilton, New Zealand.
                    Starting at the Hamilton gardens, runners/walkers proceed along the Te Awa River Ride to Tamahere and then back to the gardens then out along the Te Awa River Ride out to Pukete near the horse farm, then return along the same path back to the gardens to the finish. This is a similar undulating course to previous years.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="text-center">
                <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg mt-3 py-4 px-5">MORE</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

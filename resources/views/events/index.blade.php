@include('layouts.header')
@include('layouts.navbar')

<div class="row">
    <h1 class="text-center fs-1 fw-bolder">Book in your event today!</h1>
    @if (Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center my-4">
        <div class="col-md-3 p-3">
            <form action="{{ route('events.index') }}" method="GET" class="input-group mb-3">
                <input type="text" name="search" class="form-control fs-3" placeholder="Search events..." value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
        </div>
        <div class="col-md-3 p-3">
            <form action="{{ route('events.index') }}" method="GET" class="input-group mb-3">
                <select name="category" class="form-control fs-3" onchange="this.form.submit()">
                    <option value="">All Categories </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <noscript><button type="submit" class="btn btn-secondary">Filter</button></noscript>
            </form>
        </div>
    </div>
    

    <div class="row mt-4">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card mb-4 border-0">
                    <div class="card-body">
                        <h5 class="card-title fs-3 text-">{{ $event->title }}</h5>
                        <p class="card-text fs-5 text-start">{{ $event->description }}</p>
                        <div class="row justify-content-center">
                        @auth
                            <div class="col-auto">
                                <a href="{{ route('events.book', $event->id) }}" class="btn btn-primary">Book Event</a>
                            </div>
                        @else
                                <div class="col-auto fs-3 text-danger">
                                <p>Please sign up an account to book your event! &#128512;</p>
                                </div>
                            @endauth
                        </div>

                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>No events found</p>
        @endforelse
    </div>
</div>

@include('layouts.footer')

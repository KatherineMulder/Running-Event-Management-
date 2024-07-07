@include('layouts.header')
@include('layouts.navbar')


<div class="container d-flex justify-content-center align-items-center" style="height: 50vh;">
    <div class="card border-0" style="width: 60rem;">
        <div class="card-body d-flex flex-column justify-content-between text-center">
            <h5 class="card-title fs-3">Book Event: {{ $event->title }}</h5>
            <form action="{{ route('events.book.store', $event->id) }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="form-group fs-3">
                    <label for="tickets">Tickets</label>
                    <input type="number" name="tickets" class="form-control fs-3" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Buy Event Tickets</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')

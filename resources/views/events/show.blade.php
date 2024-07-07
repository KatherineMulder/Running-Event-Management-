@include('layouts.header')
@include('layouts.navbar')

<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title bg-warning" >{{ $event->title }}</h3>
                    <p class="card-text fs-3">Location: {{ $event->location }}</p>
                    <p class="card-text fs-3">Date: {{ date('Y-m-d', strtotime($event->dateTime)) }}</p>
                    <p class="card-text fs-3">Price: ${{ $event->price }}</p>
                    <p class="card-text fs-3">Available Tickets: {{ $event->maximum_tickets }}</p>

                    <!-- book tickets -->
                    <form action="{{ route('events.book.store', $event->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="form-group fs-3 text-center">
                            <label for="tickets">Tickets:</label>
                            <input type="number" name="tickets" class="form-control" min="1" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2 btn-lg">Add</button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg">Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Display current bookings for the event -->
                    <h2 class="card-title">Your Bookings</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered fs-3">
                            <thead>
                                <tr>
                                    <th scope="col">Event</th>
                                    <th scope="col">Tickets</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Cancel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->bookings as $booking)
                                    @if ($booking->user_id == Auth::id())
                                        <tr>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $booking->tickets }}</td>
                                            <td>
                                                <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <input type="number" name="tickets" value="{{ $booking->tickets }}" class="form-control" min="1" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-secondary">Update & Review</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

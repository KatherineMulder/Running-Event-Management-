@include('layouts.header')
@include('layouts.navbar')

<div class="container">
    <h1 class="text-center fs-1 fw-bolder">My Bookings</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive fs-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Tickets</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->event->title }}</td>
                                <td>{{ $booking->tickets }}</td>
                                <td>
                                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="tickets">Update Tickets</label>
                                            <input type="number" name="tickets" class="form-control" min="1" value="{{ $booking->tickets }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg">Back to Events</a>
    </div>
</div>

@include('layouts.footer')

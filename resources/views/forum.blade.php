@include('layouts.header')
@include('layouts.navbar')

<div class="container">
    <h1 class="text-center text-uppercase fs-1">Discussion Board</h1>

    @if(Auth::check())
    <!-- New Message Section -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title fs-2 text-center pd-2">New Message</h2>
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="fs-4">Title:</label>
                    <input type="text" class="form-control fs-4" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body" class="fs-4">Message:</label>
                    <textarea class="form-control fs-4" id="body" name="body" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- All Messages Section -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title fs-2 text-center pd-2">All Messages</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fs-4">Title</th>
                            <th class="fs-4">Author</th>
                            <th class="fs-4">Date</th>
                            <th class="fs-4">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="fs-4">{{ $post->title }}</td>
                            <td class="fs-4">{{ $post->created_at }}</td>
                            <td class="fs-4">{{ $post->body }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @auth
        <div class="text-center">
        <a href="{{ url('/view-my-posts') }}" class="btn btn-primary btn-lg">VIEW MY TOPICS</a>
        </div>
    @endauth
</div>

@include('layouts.footer')

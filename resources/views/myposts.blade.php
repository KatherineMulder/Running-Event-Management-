@include('layouts.header')
@include('layouts.navbar')

<!-- MAIN AREA -->
<div class="container">
    <h1 class="text-center p-3">My Discussion Board</h1>
    <!-- My Messages Section -->
    <div class="card">
        <div class="card-body">
            <h2 class="card-title fs-2 text-center pd-2">My Messages</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fs-4">Title</th>
                            <th class="fs-4">Date</th>
                            <th class="fs-4">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myposts as $post)
                        <tr>
                            <td class="fs-4">{{ $post->title }}</td>
                            <td class="fs-4">{{ $post->created_at }}</td>
                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">{{ $post->body }}</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="margin-left: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

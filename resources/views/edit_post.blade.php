@include('layouts.header')
@include('layouts.navbar')

<div class="container">
        <h1 class="mt-5 text-center pd-2 ">Edit Post</h1>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title" class="fs-4">Title:</label>
                        <input type="text" class="form-control fs-4" id="title" name="title" value="{{ $post->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="body" class="fs-4">Body:</label>
                        <textarea class="form-control fs-4" id="body" name="body" required>{{ $post->body }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Update Post</button>
                </form>
            </div>
        </div>
    </div>
 @include('layouts.footer')
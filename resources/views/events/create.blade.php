
@include('layouts.header')
@include('layouts.navbar')

<div class="container">
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <!-- Add other form fields here -->

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control fs-3" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>

@include('layouts.footer')

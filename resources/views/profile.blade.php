@include('layouts.header')
@include('layouts.navbar')


<div class="container text-center">
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

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="profile-style p-4 bg-light mb-4">
                <h2>Update Profile</h2>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="email" class="col-sm-4 col-form-label">Email address</label>
                        <div class="col-sm-8">
                            <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>

            <div class="update-password-style p-4 bg-light">
                <h2>Update Password</h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
                        <div class="col-sm-8">
                            <input name="current_password" type="password" class="form-control" id="current_password" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="new_password" class="col-sm-4 col-form-label">New Password</label>
                        <div class="col-sm-8">
                            <input name="new_password" type="password" class="form-control" id="new_password" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="new_password_confirmation" class="col-sm-4 col-form-label">Confirm New Password</label>
                        <div class="col-sm-8">
                            <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

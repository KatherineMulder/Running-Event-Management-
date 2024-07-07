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
            <div class="update-style p-4 bg-light mb-4">
                <h2>Update Account</h2>
                <form action="{{ route('account.update') }}" method="POST">
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
                    <div class="mb-3 row align-items-center">
                        <label for="password" class="col-sm-4 col-form-label">New Password (optional)</label>
                        <div class="col-sm-8">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter new password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </form>
            </div>

            <div class="deactivate-style p-4 bg-light">
                <h2>Deactivate Account</h2>
                <form action="{{ route('account.deactivate') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Deactivate Account</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

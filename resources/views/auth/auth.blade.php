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
        <!-- Register Form -->
        <div class="col-md-6">
            <div class="register-style p-4 bg-light mb-4">
                <h2>Register</h2>
                <form action="{{ route('signup') }}" method="POST">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="email" class="col-sm-4 col-form-label">Email address</label>
                        <div class="col-sm-8">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>

        <!-- Login Form -->
        <div class="col-md-6">
            <div class="login-style p-4 bg-light">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label for="loginemail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input name="loginemail" type="email" class="form-control" id="loginemail" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="loginpassword" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input name="loginpassword" type="password" class="form-control" id="loginpassword" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

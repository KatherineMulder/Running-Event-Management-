@include('header')
@include('navbar')

<div class="container text-center">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}</p>
</div>

@include('footer')

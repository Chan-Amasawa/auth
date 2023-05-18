@extends('layouts.master');

@section('title')
    Student's Login
@endsection

@section('content')
    <h4>Student's Login</h4>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('auth.check') }}" method="post">
        @csrf

        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary mt-3">Login</button>
    </form>
@endsection

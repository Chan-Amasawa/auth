@extends('layouts.master')

@section('title')
    Student's Register
@endsection

@section('content')
    <h4 class="mt-2">Student's Register</h4>

    <form action="{{ route('auth.store') }}" method="post">
        @csrf
        {{-- name --}}
        <label class=" form-label" for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}"
            class=" form-control mb-2 @error('name') is-invalid @enderror" id="name">
        @error('name')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- email --}}
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- password --}}
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control
        @error('password') is-invalid @enderror" id="password"
            name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- password_confirmation --}}
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input type="password" class="form-control
        @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- button --}}
        <button class="btn btn-primary mt-3">Register</button>
    </form>
@endsection

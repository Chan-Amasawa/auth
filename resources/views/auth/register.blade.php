@extends('layouts.master')

@section('title')
    Student's Register
@endsection

@section('content')
    <h4 class="mt-2">Register</h4>
    <form action="{{ route('auth.store') }}" method="post">
        @csrf

        <label class=" form-label" for="name">Name</label>
        <input type="text" name="name" class=" form-control mb-2 @error('name') is-invalid @enderror" id="name"
            value={{ old('name') }}>
        @error('name')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary mt-3">Register</button>
    </form>
@endsection

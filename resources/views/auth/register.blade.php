@extends('layouts.master');

@section('title')
    Student's Register
@endsection

@section('content')
    <h4>Register</h4>
    <form action="{{ route('auth.store') }}" method="post">
        @csrf

        <div class=" mb-3">
            <label for="title">Title</label>
            <input id="title" type="text" value="{{ old('title') }}"
                class="form-control
            @error('title') is-invalid @enderror" name="title">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </form>
@endsection

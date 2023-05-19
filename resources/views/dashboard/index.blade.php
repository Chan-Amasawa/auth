@extends('layouts.master');

@section('title')
    Dashboard
@endsection

@section('content')
    <h4>Student's Dashboard</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime iusto dolores aspernatur sequi velit! Quaerat
        recusandae, rerum, et magni inventore nulla officia est nisi animi, natus saepe omnis doloribus itaque.</p>
    <div class=" alert alert-info">
        {{ session('auth')->name }}
    </div>

    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button class="btn btn-primary">Logout</button>
    </form>
@endsection

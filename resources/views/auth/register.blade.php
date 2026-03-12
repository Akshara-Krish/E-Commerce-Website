@extends('home')
@section('register')
<form method="POST" action="{{ route('register') }}" class="register-form">
    @csrf
    <h2>Register</h2>
    <div class="input-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus>
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <x-primary-button class="mt-4" class="btn btn-primary">
        {{ __('Register') }}
    </x-primary-button>
</form>

@endsection()

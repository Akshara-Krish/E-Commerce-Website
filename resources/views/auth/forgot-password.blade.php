{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('home')
@section('forget')
<div class="forgot-password-container">
    <h2>Forgot Your Password?</h2>
    <p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="forgot-password-form">
        @csrf

        <div class="input-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

      <button type="submit" class="btn btn-primary">
    Email Password Reset Link
</button>
    </form>
@endsection()
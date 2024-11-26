@extends('layouts.app')

@section('content')
    <h1>{{ __('Reset Password') }}</h1>

    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">{{ __('Email Address') }}</label>
        <input type="email" name="email" id="email" required>

        @error('email')
            <div>
                {{ $message }}
            </div>
        @enderror

        <button type="submit">
            {{ __('prueba') }}
        </button>
    </form>
@endsectio
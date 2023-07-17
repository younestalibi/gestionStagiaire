@extends('layouts.index2')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="text-md-end">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <input type="hidden" value="admin" name="user_type">
        <div class="row mb-3">
            <label for="email" class="text-md-end">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="row mb-3">
            <label for="password" class="text-md-end">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="text-md-end">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="row mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
        </div>
    </form>

@endsection

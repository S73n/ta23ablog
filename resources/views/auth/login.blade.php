@extends('partials.layout')
@section('title', 'Login')
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div>
                    <h1 class="card-title">{{ __('Welcome back') }}</h1>
                    <p class="text-base-content/80">{{ __('Enter your credentials to access your account.') }}</p>
                </div>
                @if (session('status'))
                    <div role="alert" class="alert alert-success">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Email')</legend>
                        <input type="email" name="email" class="input w-full" value="{{ old('email') }}"
                            placeholder="@lang('Email')" required autofocus autocomplete="username" />
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Password')</legend>
                        <input type="password" name="password" class="input w-full" placeholder="@lang('Password')"
                            required autocomplete="current-password" />
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <label class="label justify-start gap-2">
                        <input name="remember" type="checkbox" class="checkbox" />
                        <span class="label-text">@lang('Remember me')</span>
                    </label>
                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <button class="btn btn-primary">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
                <p class="text-sm text-center text-base-content/80">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="link link-primary">{{ __('Register now') }}</a>
                </p>
            </div>
        </div>
    </div>
@endsection

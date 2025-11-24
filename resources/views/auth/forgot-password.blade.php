@extends('partials.layout')
@section('title', __('Forgot Password'))
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div>
                    <h1 class="card-title">{{ __('Forgot your password?') }}</h1>
                    <p class="text-base-content/80">
                        {{ __('No problem. Enter your email address and we will send you a reset link.') }}
                    </p>
                </div>
                @if (session('status'))
                    <div role="alert" class="alert alert-success">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">{{ __('Email') }}</legend>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="input w-full" />
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <div class="flex justify-end">
                        <button class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('partials.layout')
@section('title', __('Reset Password'))
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div>
                    <h1 class="card-title">{{ __('Create a new password') }}</h1>
                    <p class="text-base-content/80">{{ __('Enter the email linked to your account and choose a new password.') }}</p>
                </div>
                <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">{{ __('Email') }}</legend>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                            required autocomplete="username" class="input w-full" autofocus />
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">{{ __('Password') }}</legend>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="input w-full" />
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" class="input w-full" />
                        @error('password_confirmation')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <div class="flex items-center justify-end">
                        <button class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

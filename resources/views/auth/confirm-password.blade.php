@extends('partials.layout')
@section('title', __('Confirm Password'))
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <h1 class="card-title">{{ __('Confirm Password') }}</h1>
                <p class="text-base-content/80">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">{{ __('Password') }}</legend>
                        <input id="password" type="password" name="password" class="input w-full"
                            required autocomplete="current-password" />
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <div class="flex justify-end">
                        <button class="btn btn-primary" type="submit">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

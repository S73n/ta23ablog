@extends('partials.layout')
@section('title', 'Register')
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div>
                    <h1 class="card-title">{{ __('Create an account') }}</h1>
                    <p class="text-base-content/80">{{ __('Join the community and start sharing your posts.') }}</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Name')</legend>
                    <input type="text" name="name" class="input w-full" value="{{ old('name') }}"
                        placeholder="@lang('Name')" required autofocus autocomplete="name" />
                    @error('name')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input type="email" name="email" class="input w-full" value="{{ old('email') }}"
                        placeholder="@lang('Email')" required autocomplete="username" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input type="password" name="password" class="input w-full"
                        placeholder="@lang('Password')" required autocomplete="new-password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                    <input type="password" name="password_confirmation" class="input w-full"
                        placeholder="@lang('Confirm Password')" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-between">
                    <a class="link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

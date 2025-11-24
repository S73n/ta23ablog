@extends('partials.layout')
@section('title', __('Verify Email'))
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body space-y-6">
                <h1 class="card-title">{{ __('Verify your email') }}</h1>
                <p class="text-base-content/80">
                    {{ __('Thanks for signing up! Please click the verification link we sent to your inbox. If you did not receive the email we can send another one.') }}
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div role="alert" class="alert alert-success">
                        <span>{{ __('A new verification link has been sent to the email provided during registration.') }}</span>
                    </div>
                @endif
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                        @csrf
                        <button class="btn btn-primary w-full">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="btn btn-ghost w-full">
                            {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

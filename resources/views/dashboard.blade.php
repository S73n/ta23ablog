@extends('partials.layout')
@section('title', __('Dashboard'))
@section('content')
    <div class="py-10">
        <div class="max-w-5xl mx-auto space-y-6">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Welcome back!') }}</h2>
                    <p>{{ __("You're logged in and ready to create something great.") }}</p>
                    <div class="grid gap-4 mt-6 md:grid-cols-3">
                        <div class="stat bg-base-200 rounded-box">
                            <div class="stat-title text-base-content/70">{{ __('Posts published') }}</div>
                            <div class="stat-value text-primary">{{ \App\Models\Post::count() }}</div>
                            <div class="stat-desc">{{ __('Across the entire blog') }}</div>
                        </div>
                        <div class="stat bg-base-200 rounded-box">
                            <div class="stat-title text-base-content/70">{{ __('Latest post') }}</div>
                            <div class="stat-value text-secondary text-xl truncate">
                                {{ optional(\App\Models\Post::latest()->first())->title ?? __('None yet') }}
                            </div>
                            <div class="stat-desc">
                                {{ optional(\App\Models\Post::latest()->first())->created_at?->diffForHumans() ?? '' }}
                            </div>
                        </div>
                        <div class="stat bg-base-200 rounded-box">
                            <div class="stat-title text-base-content/70">{{ __('Account email') }}</div>
                            <div class="stat-value text-accent text-lg truncate">{{ auth()->user()->email }}</div>
                            <div class="stat-desc">{{ __('Manage details from your profile page') }}</div>
                        </div>
                    </div>
                    <div class="card-actions justify-end mt-6">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            {{ __('Manage profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

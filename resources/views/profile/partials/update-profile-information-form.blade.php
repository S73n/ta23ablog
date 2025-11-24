<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-2xl font-semibold text-base-content">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-base-content/80">
            {{ __("Update your account's profile details and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input type="text" name="name" class="input w-full" value="{{ old('name', $user->name) }}"
                placeholder="@lang('Name')" required autofocus autocomplete="name" />
            @error('name')
                <p class="label">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Email')</legend>
            <input type="email" name="email" class="input w-full" value="{{ old('email', $user->email) }}"
                placeholder="@lang('Email')" required autocomplete="username" />
            @error('email')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="rounded-lg bg-base-200 p-4 text-sm">
                <p class="text-base-content/80 mb-2">
                    {{ __('Your email address is unverified.') }}
                </p>
                <button form="send-verification" class="btn btn-sm btn-outline btn-primary">
                    {{ __('Re-send verification email') }}
                </button>
                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-success">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save changes') }}</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success">{{ __('Saved!') }}</p>
            @endif
        </div>
    </form>
</section>

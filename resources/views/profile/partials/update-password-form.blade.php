<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-2xl font-semibold text-base-content">
            {{ __('Update Password') }}
        </h2>
        <p class="text-base-content/80">
            {{ __('Ensure your account uses a strong, unique password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Current Password') }}</legend>
            <input name="current_password" type="password" class="input w-full" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('New Password') }}</legend>
            <input name="password" type="password" class="input w-full" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
            <input name="password_confirmation" type="password" class="input w-full" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save changes') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success">{{ __('Saved!') }}</p>
            @endif
        </div>
    </form>
</section>

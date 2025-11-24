<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-2xl font-semibold text-base-content">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-base-content/80">
            {{ __('Once your account is deleted, all data will be permanently removed. Download anything you want to keep before continuing.') }}
        </p>
    </header>

    <button class="btn btn-error" type="button" onclick="document.getElementById('deleteAccountModal').showModal()">
        {{ __('Delete Account') }}
    </button>

    <dialog id="deleteAccountModal" class="modal">
        <div class="modal-box space-y-4">
            <h3 class="font-bold text-lg">{{ __('Confirm account deletion') }}</h3>
            <p class="text-base-content/80">
                {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Password') }}</legend>
                    <input type="password" name="password" class="input w-full" placeholder="{{ __('Password') }}" />
                    @error('password', 'userDeletion')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <div class="modal-action">
                    <button type="button" class="btn" onclick="document.getElementById('deleteAccountModal').close()">
                        {{ __('Cancel') }}
                    </button>
                    <button class="btn btn-error">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @if ($errors->userDeletion->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('deleteAccountModal')?.showModal();
            });
        </script>
    @endif
</section>

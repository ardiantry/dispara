{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
<div class="col">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Update Password</h4>
            <p class="card-title-desc">Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.
            </p>
            <form class="custom-validation" method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                @if ($messages = session('success-password'))
                    <div class="alert alert-success">
                        {{ $messages }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="current_password">Password Lama</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required
                        placeholder="Isikan password lama" autocomplete="current-password" />
                    <div>
                        @if ($errors->updatePassword->get('current_password'))
                            <div class="alert alert-danger">
                                {{ $errors->updatePassword->first('current_password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pass2">New Password</label>
                    <input type="password" id="pass2" name="password" class="form-control" required
                        placeholder="Password baru" autocomplete="new-password" />
                    <div>
                        @if ($errors->updatePassword->get('password'))
                            <div class="alert alert-danger">
                                {{ $errors->updatePassword->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="passConfirm">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="passConfirm" required
                        data-parsley-equalto="#pass2" placeholder="Ketik ulang password baru"
                        autocomplete="new-password" />
                    <div>
                        @if ($errors->updatePassword->get('password_confirmation'))
                            <div class="alert alert-danger">
                                {{ $errors->updatePassword->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Simpan
                    </button>
                </div>
            </form>
            <!-- end form -->
        </div>
    </div>
</div> <!-- end col -->

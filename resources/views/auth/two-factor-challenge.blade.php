@php
    $locale = app()->getLocale();
@endphp

<x-guest-layout>
    @section('title', __('auth.2fa_title'))
    @section('meta_description', __('auth.2fa_description'))

    @push('meta')
        <meta name="description" content="{{ __('auth.2fa_description') }}">
        <meta name="robots" content="noindex, nofollow">
    @endpush

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('auth.2fa_instruction') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                {{ __('auth.2fa_recovery_instruction') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-label for="code">{{ __('auth.code') }}</x-label>
                    <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code">{{ __('auth.recovery_code') }}</x-label>
                    <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button"
                            class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            ">
                        {{ __('auth.use_recovery_code') }}
                    </button>

                    <button type="button"
                            class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            ">
                        {{ __('auth.use_auth_code') }}
                    </button>

                    <x-button class="ms-4">
                        {{ __('auth.login') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>

@php $locale = app()->getLocale(); @endphp

<x-action-section>
    @section('title', __('auth.delete_account_title'))
    @section('meta_description', __('auth.delete_account_description'))

    <x-slot name="title">
        {{ __('auth.delete_account_title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('auth.delete_account_subtitle') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('auth.delete_account_warning') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('auth.delete_account_button') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('auth.delete_account_title') }}
            </x-slot>

            <x-slot name="content">
                {{ __('auth.delete_account_modal_message') }}

                <div class="mt-4" x-data="{}"
                     x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                             autocomplete="current-password"
                             placeholder="{{ __('auth.password_placeholder') }}"
                             x-ref="password"
                             wire:model="password"
                             wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('auth.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('auth.confirm_delete') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>

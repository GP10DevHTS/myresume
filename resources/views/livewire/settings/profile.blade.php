<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <flux:input wire:model="job_title" :label="__('Job Title')" type="text" required autofocus autocomplete="job_title" />
            <flux:input wire:model="city" :label="__('City')" type="text" required autofocus autocomplete="city" />
            <flux:input wire:model="phone_number" :label="__('Phone Number')" type="text" required autofocus autocomplete="phone_number" />
            <flux:input wire:model="date_of_birth" :label="__('Date of Birth')" type="date" required autofocus autocomplete="date_of_birth" />


            <flux:input wire:model="twitter" :label="__('Twitter')" type="text"  autofocus autocomplete="twitter" />
            <flux:input wire:model="facebook" :label="__('Facebook')" type="text"  autofocus autocomplete="facebook" />
            <flux:input wire:model="instagram" :label="__('Instagram')" type="text"  autofocus autocomplete="instagram" />
            <flux:input wire:model="linkedin" :label="__('Linked In')" type="text"  autofocus autocomplete="linkedin" />
            <flux:input wire:model="github" :label="__('GitHub')" type="text"  autofocus autocomplete="github" />


            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>

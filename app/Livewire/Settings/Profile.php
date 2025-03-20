<?php

namespace App\Livewire\Settings;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Profile extends Component
{
    public string $name = '';

    public string $email = '';

    public $job_title;
    public $city;
    public $phone_number;
    public $date_of_birth;

    public $twitter,
        $facebook,
        $instagram,
        $linkedin, $github;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->job_title = Auth::user()->job_title;
        $this->city = Auth::user()->city;
        $this->phone_number = Auth::user()->phone_number;
        $this->date_of_birth = Auth::user()->date_of_birth ? Carbon::parse(Auth::user()->date_of_birth)->format('Y-m-d') : null;

        $this->twitter = Auth::user()->twitter;
        $this->facebook = Auth::user()->facebook;
        $this->instagram = Auth::user()->instagram;
        $this->linkedin = Auth::user()->linkedin;
        $this->github = Auth::user()->github;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],

            'job_title' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'max:255'],

            "twitter" => ['nullable', 'sometimes', 'url'],
            "facebook" => ['nullable', 'sometimes', 'url'],
            "instagram" => ['nullable', 'sometimes', 'url'],
            "linkedin" => ['nullable', 'sometimes', 'url'],
            "github" => ['nullable', 'sometimes', 'url'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }


        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}

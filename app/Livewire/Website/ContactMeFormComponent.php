<?php

namespace App\Livewire\Website;

use App\Models\User;
use Livewire\Component;

class ContactMeFormComponent extends Component
{

    public $user,
        $name,
        $email,
        $message,
        $subject;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
    }
    public function render()
    {
        return view('livewire.website.contact-me-form-component');
    }

    public function sendContactForm()
    {
        $this->validate([
            'name' => "required",
            'email' => "required|email",
            'message' => "required",
            'subject' => "required",
        ]);

        $this->dispatch("saved");
    }
}

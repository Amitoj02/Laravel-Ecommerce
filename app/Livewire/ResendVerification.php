<?php

namespace App\Livewire;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Livewire\Component;

class ResendVerification extends Component
{
    public $title;
    public $message;
    public $email;
    public bool $canResend;

    public function mount($email = null) {
        $this->email = $email;
        $this->canResend = !empty($email);
    }

    public function render()
    {
        return view('livewire.resend-verification');
    }

    public function resend() {

        $user = User::query()->where('email', $this->email)->first();
        $user->sendVerificationEmail();

        $this->title = '';
        $this->message = 'The verification link was sent to the email.';
        $this->canResend = false;
    }
}

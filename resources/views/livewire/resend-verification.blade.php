<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">{{ $title }}</h4>
    <p>{{ $message }}</p>
    @if($canResend)
    <hr>
    <p class="mb-0" wire:loading.remove>Didn't receive verification email? <a href="#" wire:click="resend">Resend it</a>.</p>
    <div class="spinner-border" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
    </div>
    @endif
</div>

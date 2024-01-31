<?php

namespace App\Notifications;

use App\Filament\Resources\CatalogResource;
use App\Filament\Resources\OrderResource;
use App\Models\Review;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CatalogReview extends Notification
{
    use Queueable;
    private Review $review;
    /**
     * Create a new notification instance.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
//        return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return FilamentNotification::make()
            ->title('New Customer Review')
            ->icon('heroicon-o-star')
            ->body("{$this->review->user->name} rated {$this->review->star} stars to a product.")
            ->actions([
                Action::make('View')
                    ->url(CatalogResource::getUrl('view', ['record' => $this->review->catalog])),
            ])
            ->getDatabaseMessage();
    }
}

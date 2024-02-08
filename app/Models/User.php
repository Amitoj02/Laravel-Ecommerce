<?php

namespace App\Models;

 use App\Mail\SmtpMailer;
 use Illuminate\Contracts\Auth\CanResetPassword;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 use Illuminate\Support\Carbon;
 use Illuminate\Support\Facades\Config;
 use Illuminate\Support\Facades\URL;
 use Laravel\Sanctum\HasApiTokens;
 use PHPMailer\PHPMailer\Exception;

 class User extends Authenticatable implements FilamentUser, MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'is_admin',
        'address',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin;
    }

    public function cartItems(): HasMany{
        return $this->hasMany(CartItem::class, 'item_id');
    }

    public function orders(): HasMany{
        return $this->hasMany(Order::class);
    }

     /**
      * @throws Exception
      */
     public function sendVerificationEmail(): void
    {
        if (!$this->hasVerifiedEmail()) {

            $url = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $this->getKey(),
                    'hash' => sha1($this->getEmailForVerification()),
                ]
            );

            $mail = new SmtpMailer();
            $mail->addAddress($this->email);
            $mail->Subject = 'Verification Email for Swarn Abhishek Account';
            $mail->Body = 'Please <a href="' . $url . '">click here</a> to verify your email address for Swarn Abhishek website account.<br><br>If you did not create an account, no further action is required.';
            $mail->send();
//            if($mail->send()){
//                echo 'Message has been sent';
//            }else{
//                echo 'Message could not be sent.';
//                echo 'Mailer Error: ' . $mail->ErrorInfo;
//            }
        }
    }
}

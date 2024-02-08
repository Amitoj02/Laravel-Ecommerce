<?php

namespace App\Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/*
    $mail->addAddress('ellen@example.com');
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the message body';
 */
class SmtpMailer extends PHPMailer
{
    /**
     * @throws Exception
     */
    public function __construct($exceptions = null)
    {
        parent::__construct($exceptions);
//        $this->SMTPDebug = env('APP_DEBUG');
        $this->SMTPDebug = 0;
        $this->isSMTP();
        $this->Host = env('MAIL_HOST');
        $this->SMTPAuth = true;
        $this->Username = env('MAIL_USERNAME');
        $this->Password = env('MAIL_PASSWORD');
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->Port = env('MAIL_PORT');
        $this->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $this->addReplyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $this->isHTML(true);
    }
}

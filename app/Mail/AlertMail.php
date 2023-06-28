<?php

namespace App\Mail;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertMail extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public Notification $notif;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Notification $notif)
    {
        $this->user=$user;
        $this->notif=$notif;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('alert@servtool.org'),
            to:$this->user->email,
            subject: $this->notif->title,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.alert_mail',
            with:[
                'first_name'=>$this->user->first_name,
                'last_name'=>$this->user->last_name,
                'title'=>$this->notif->title,
                'description'=>$this->notif->description,
                'trigger_time'=>$this->notif->created_at,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

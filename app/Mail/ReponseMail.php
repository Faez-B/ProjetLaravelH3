<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReponseMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $firstname;
    protected $email;
    protected $lastname;

    // protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->email = $email;
        $this->lastname = $lastname;

        // $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $random = Str::random(8);
        $password = bcrypt($random);
        User::create([
            'email' => $this->email,
            'password' => $password,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'role' => "utilisateur",
            'status' => "valide",
        ]);
        return $this->view('emails.reponse')
                ->from("admin@admin.com")
                ->with([
                    "email" => $this->email,
                    "random" => $random,
                ]);
    }
}

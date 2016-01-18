<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\User;
use App\Repositories\PetRepository;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $pets;


    public function __construct(PetRepository $pets)
    {
        //
        $this->pets = $pets;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        $user = $event->user;



        Mail::send('email.login', ['user' => $user,'pets' => $this->pets->forUser($user),], function ($m) use ($user) {

            $m->to($user->email, $user->name)->subject('有博得登录');
        });
    }
}

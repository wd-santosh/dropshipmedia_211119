<?php

namespace App\Listeners;
use App\User;
use App\Events\Customer_Order_Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class Customer_Order_Listener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Customer_Order_Event  $event
     * @return void
     */
    public function handle(Customer_Order_Event $event)
    {
      
        $customer=User::find(Auth::user()->id);
        $data = array('name' => $customer->email, 'email' => $customer->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
        Mail::send('customermail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Welcome to our Website');          
                             
        });
    }
}

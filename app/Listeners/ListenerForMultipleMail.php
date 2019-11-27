<?php

namespace App\Listeners;
use App\Models\employees;
use App\Events\EventForMultipleMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Mail;

class ListenerForMultipleMail
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
     * @param  EventForMultipleMail  $event
     * @return void
     */
    public function handle(EventForMultipleMail $event)
    {
        $customer=employees::get();
        foreach ($customer as $value) {

        $data = array( 'name' => $value->email, 'email' => $value->email,'body' => 'Welcome to our website. Hope you will enjoy our articles');
        
        Mail::send('customermail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Welcome to our Website');          
                             
        });
    }
    
}
    
}

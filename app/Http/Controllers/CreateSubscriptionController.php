<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Subscription;

class CreateSubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * @param string $plan
     * @return \Illuminate\Http\RedirectResponse
     */
     public function __invoke(string $plan)
     {
         $user = Auth::user();

         if($user->subscribed('Premium membership')) {

             return back()->withSuccess('You are already on the ' . $plan . ' plan');
         }
         else
         {
           $name = ucfirst($plan) . ' membership';
           $result = $user->newSubscriptionViaMollieCheckout($name, $plan)->create();

           if(is_a($result, RedirectResponse::class)) {
               return $result; // Redirect to Mollie checkout
           }

           // $result is a \Laravel\Cashier\Subscription model
           return redirect('/')->withSuccess('Welcome to the ' . $plan . ' plan');
         }

     }


     public function cancel()
     {
       $user = Auth::user();

       $user->subscription('Premium membership')->cancelAt(now());

       Subscription::where('owner_id', $user->id)->delete();
       return back()->withSuccess('Subscription Cancelled. To access the exclusive member area subscribe again. Thank you');

     }

}

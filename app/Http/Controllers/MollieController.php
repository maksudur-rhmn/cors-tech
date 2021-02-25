<?php

namespace App\Http\Controllers;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use App\Models\Course;
use Auth;
use Carbon\Carbon;

class MollieController extends Controller
{

    public function  __construct() {
        Mollie::api()->setApiKey('test_tedgFe2tyGb6A5qbg3WsD7ywyQUtTP'); // your mollie test api key
        $this->middleware('auth')->except('handle');
        $this->middleware('verified')->except('handle');
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment(Request $request)
    {


      $course = Course::findOrFail($request->course_id);
        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR', // Type of currency you want to send
            'value' => $course->price. '.00', // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => $request->coursename . ' By CorsTech',
        "webhookUrl" => route('webhooks.mollie'),
        'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        Sale::create([
          'user_id'    => Auth::id(),
          'course_id'  => $request->course_id,
          'price'      => $course->price,
          'payment_id' => $payment->id,
          'trainer_id' => $course->getUser->id,
          'created_at' => Carbon::now(),
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }


    public function handle(Request $request) {
        if (! $request->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($request->id);
        if($payment->isPaid()) {

          $sale = Sale::where('payment_id', $request->id)->firstOrFail();
          $sale->status = 'paid';
          $sale->save();
        }
    }


    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess(Request $request) {

        return redirect('/student')->withSuccess('Thank you for buying the course and is accessible in your dashboard');

    }
}

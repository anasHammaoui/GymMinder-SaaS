<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\PlatformPayment;
use App\Models\User;
use App\Notifications\AdminNotification;
use App\Notifications\PaymentNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Stripe;

class PlatformPaymentController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view("owner.subscriptions")->with("page", "Subscriptions");
        }

        return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access this page.']);
    }

    // checkout
    public function checkout()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = CheckoutSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'GymMinder Subscription',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url, 303);
    }

    // success
    public function success(Request $request)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = CheckoutSession::retrieve($request->get('session_id'));
            if ($session->payment_status === 'paid') {
                $user = Auth::user();
                $user->is_active = true;
                $user->save();
                PlatformPayment::create([
                    'user_id' => $user->id,
                    'paymentMethod' => 'stripe',
                    'paymentDate' => now()
                ]);
                $user->notify(new PaymentNotification());
                $admins = User::where('role', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new AdminNotification($user));
                }
                // Flash success message
                Session::flash('success', 'Payment successful! Your subscription has been activated.');

                return redirect()->route('subscriptions');
            } else {
                return redirect()->route('subscriptions')->withErrors(['error' => 'Payment not completed.']);
            }
        } catch (Exception $e) {
            dd($e);
            // Handle any errors
            return redirect()->route('subscriptions')->withErrors(['error' => 'Payment processing failed.']);
        }
    }

    // cancel
    public function cancel()
    {
        // Flash cancel message
        Session::flash('error', 'Payment was canceled. Please try again.');

        return redirect()->route('subscriptions');
    }
}

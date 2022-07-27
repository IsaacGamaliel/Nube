<?php

namespace App\Http\Controllers;

use Auth;
use App\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $plans = Plan::all();
      return view('index', compact('plans'));
   }

   public function subscriptions()
   {
      $subscriptions = Auth::user()->subscriptions;
      return view('admin.subscriptions.index', compact('subscriptions'));
   }

   public function resume()
   {
      
      $subscription = \request()->user()->subscription(\request('plan_name'));

      if ($subscription->cancelled() && $subscription->onGracePeriod()) {
         \request()->user()->subscription(\request('plan_name'))->resume();
         return back()->with('info', ['success', 'La suscrpción continuará']);
      }

      return back();
   }

   public function cancel()
   {
      
      Auth::user()->subscription(\request('plan_name'))->cancel();
      return back()->with('info', ['success', 'La suscripción se ha cancelado']);
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      
      $token = $request->get('stripeToken');
      $subscription = $request->get('plan_type');
      Auth()->user()->newSubscription('main', $subscription)->create($token);
     
      Auth()->user()->assignRole('Suscriptor');
      return back()->with('info', ['success', 'Ahora estás suscrito.']);
   }

   //Invoices

   public function invoices()
   {
      $invoices = Auth::user()->invoices();
      return view('admin.subscriptions.invoices', compact('invoices'));
   }

   public function showInvoice(Request $request, $invoiceId)
   {
      return $request->user()->downloadInvoice($invoiceId, [
        'vendor'  => '¡Nube',
        'product' => 'Suscripción en la plataforma',
      ]);
   }
  


   
}

<?php

namespace App\Http\Controllers;

use App\Models\Fraud;
use Illuminate\Http\Request;

class FraudController extends Controller
{
    public function store(Request $request)
    {
        Fraud::create([
            'reason'=>$request->reason,
            'email'=>$request->email,
            'message'=>$request->message,
            'ad_id'=>$request->ad_id
        ]);
        return back()->with('message', 'Votre requête a été soumise avec succès');
    }
}

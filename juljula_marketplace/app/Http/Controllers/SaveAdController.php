<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advertisement;

class SaveAdController extends Controller
{
    public function saveAd(Request $request)
    {
        $ad=Advertisement::find($request->adId);
        $ad->userads()->syncWithOutDetaching($request->userId);
    }
}

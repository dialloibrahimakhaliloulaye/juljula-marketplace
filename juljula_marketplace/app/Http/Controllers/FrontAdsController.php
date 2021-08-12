<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;

class FrontAdsController extends Controller
{
    public function index()
    {
        //for category Multimedia
        $category=Category::CategoryMultimedia();
        $firstAds=Advertisement::firstFourAds($category->id);
        $secondAds=Advertisement::secondFourAds($category->id);

        //for category  immobilier
        $categoryImmobiliers=Category::CategoryImmobilier();
        $firstAdsForImmobiliers=Advertisement::firstFourImmobiliers($categoryImmobiliers->id);
        $secondAdsForImmobiliers=Advertisement::secondFourImmobiliers($categoryImmobiliers->id);

        $categories=Category::get();

        return view('index', compact('firstAds',
            'secondAds', 'category', 'categoryImmobiliers', 'firstAdsForImmobiliers',
            'secondAdsForImmobiliers', 'categories'));
    }
}

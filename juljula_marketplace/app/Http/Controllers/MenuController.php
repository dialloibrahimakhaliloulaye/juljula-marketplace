<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $advertisement=Advertisement::latest()->get();
        return view('index', compact('advertisement'));
        /*$category=Category::where('name', 'multimedia')->first();

        $firstAds=Advertisement::where('category_id', $category->id)->orderByDesc('id')->take(4)->get();

        $secondAds=Advertisement::where('category_id', $category->id)->whereNotIn('id', $firstAds->pluck('id')->toArray())
            ->take(4)->get();
        return view('index', compact('firstAds', 'secondAds', 'category'));*/
    }
}

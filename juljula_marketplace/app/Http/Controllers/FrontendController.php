<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Advertisement;

class FrontendController extends Controller
{
    public function findBySubcategory($categorySlug, Subcategory $subcategorySlug)
    {
        $advertisements=$subcategorySlug->ads;
        return view('product.subcategory', compact('advertisements'));
    }
}

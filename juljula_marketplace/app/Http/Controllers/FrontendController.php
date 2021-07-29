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
        $filterByChildcategories=$subcategorySlug->ads->unique('childcategory_id');
        return view('product.subcategory', compact('advertisements','filterByChildcategories'));
    }

    public function findByChildcategory($categorySlug,Subcategory $subcategorySlug,Childcategory $childcategorySlug)
    {
        $advertisements=$childcategorySlug->ads;
        $filterByChildcategories=$subcategorySlug->ads->unique('childcategory_id');
        return view('product.childcategory', compact('advertisements','filterByChildcategories'));
    }
}

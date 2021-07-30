<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Advertisement;

class FrontendController extends Controller
{
    public function findBySubcategory(Request $request, $categorySlug, Subcategory $subcategorySlug)
    {
        $advertisementBasedOnFilter=Advertisement::where('subcategory_id', $subcategorySlug->id)
            ->when($request->minPrice, function ($query, $minPrice){
                return $query->where('price','>=', $minPrice);
            })->when($request->maxPrice, function ($query,$maxPrice){
                return $query->where('price','<=', $maxPrice);
            })->get();

        $advertisementWithoutFilter=$subcategorySlug->ads;
        $filterByChildcategories=$subcategorySlug->ads->unique('childcategory_id');
        $advertisements=$request->minPrice||$request->maxPrice?
            $advertisementBasedOnFilter:$advertisementWithoutFilter;

        return view('product.subcategory', compact('advertisements','filterByChildcategories'));
    }

    public function findByChildcategory(
        $categorySlug,
        Subcategory $subcategorySlug,
        Childcategory $childcategorySlug,
        Request $request
    ){
        $advertisementBasedOnFilter=Advertisement::where('childcategory_id', $subcategorySlug->id)
            ->when($request->minPrice, function ($query, $minPrice){
                return $query->where('price','>=', $minPrice);
            })->when($request->maxPrice, function ($query,$maxPrice){
                return $query->where('price','<=', $maxPrice);
            })->get();

        $advertisementWithoutFilter=$childcategorySlug->ads;
        $filterByChildcategories=$subcategorySlug->ads->unique('childcategory_id');

        $advertisements=$request->minPrice||$request->maxPrice?
            $advertisementBasedOnFilter:$advertisementWithoutFilter;

        return view('product.childcategory',
            compact('filterByChildcategories', 'advertisements'));
    }

    public function findBycategory(Category $categorySlug)
    {
        $advertisements=$categorySlug->ads;
        $filterBySubcategories=Subcategory::where('category_id', $categorySlug->id)->get();
        return view('product.category', compact('advertisements', 'filterBySubcategories'));
    }

    public function show($id, $slug)
    {
        $advertisement=Advertisement::where('id', $id)->where('slug', $slug)->first();
        return view('product.show', compact('advertisement'));
    }
}

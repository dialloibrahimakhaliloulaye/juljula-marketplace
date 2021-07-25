<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryFormRequest;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=Subcategory::orderBy('category_id')-> get();
        return view('backend.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SubcategoryFormRequest $request)
    {
        Subcategory::create([
            'name'=>$name=$request->name,
            'slug'=>Str::slug($name),
            'category_id'=>$request->category_id
        ]);
        return back()->with('message', 'sous-category crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory=Subcategory::find($id);
        return view('backend.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SubcategoryUpdateRequest $request, $id)
    {
        Subcategory::find($id)->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('subcategory.index')->with('message', 'sous-catégorie mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Subcategory::find($id)->delete();
        return back()->with('message', 'sous-catégorie supprimée avec succès');
    }
}

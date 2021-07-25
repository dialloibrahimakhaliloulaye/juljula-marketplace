<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildcategoryRequest;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories=Childcategory::orderBy('subcategory_id')-> get();
        return view('backend.childcategory.index', compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.childcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChildcategoryRequest $request)
    {
        Childcategory::create([
            'name'=>$name=$request->name,
            'slug'=>Str::slug($name),
            'subcategory_id'=>$request->subcategory_id,
        ]);
        return back()->with('message', 'sous sous-category crée avec succès');
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
        $childcategory=Childcategory::find($id);
        return view('backend.childcategory.edit', compact('childcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChildcategoryRequest $request, $id)
    {
        Childcategory::find($id)->update([
            'name'=>$request->name,
            'subcategory_id'=>$request->subcategory_id,
        ]);
        return redirect()->route('childcategory.index')->with('message', ' sous sous-catégorie mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Childcategory::find($id)->delete();
        return back()->with('message', 'sous sous-catégorie supprimée');
    }
}

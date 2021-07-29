<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdsFormRequest;
use App\Http\Requests\AdsFormUpdateRequest;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Advertisement::latest()->where('user_id', auth()->user()->id)->get();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(AdsFormRequest $request): string
    {
        $data=$request->all();
        if ($request->hasFile('first_image')){
            $firstImage=$request->file('first_image')->store('public/ads');
            $data['first_image']=$firstImage;
        }
        if ($request->hasFile('second_image')){
            $secondImage=$request->file('second_image')->store('public/ads');
            $data['second_image']=$secondImage;
        }
        if ($request->hasFile('third_image')){
            $thirdImage=$request->file('third_image')->store('public/ads');
            $data['third_image']=$thirdImage;
        }

        $data['slug']=Str::slug($request->name);
        $data['user_id']=auth()->user()->id;

        Advertisement::create($data);
        return redirect()->route('ads.index')->with('message', 'Annonce créée avec succès');
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
        $ad=Advertisement::find($id);
        $this->authorize('edit-ad', $ad);
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdsFormUpdateRequest $request, $id)
    {
        $ad=Advertisement::find($id);
        $firstImage=$ad->first_image;
        $secondImage=$ad->second_image;
        $thirdImage=$ad->third_image;
        $data=$request->all();
        if ($request->hasFile('first_image')){
            $firstImage=$request->file('first_image')->store('public/ads');
        }
        if ($request->hasFile('second_image')){
            $secondImage=$request->file('second_image')->store('public/ads');
        }
        if ($request->hasFile('third_image')){
            $thirdImage=$request->file('third_image')->store('public/ads');
        }
        $data['first_image']=$firstImage;
        $data['second_image']=$secondImage;
        $data['third_image']=$thirdImage;

        $ad->update($data);
        return redirect()->route('ads.index')->with('message', 'Annonce mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ad=Advertisement::find($id);
        $ad->delete();
        return back()->with('message','Annonce supprimée avec succès');
    }
}

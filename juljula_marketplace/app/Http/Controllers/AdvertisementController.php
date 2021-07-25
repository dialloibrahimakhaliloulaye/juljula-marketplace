<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdsFormRequest;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(AdsFormRequest $request)
    {
        $data=$request->all();
        $firstImage=$request->file('first_image')->store('public/ads');
        $secondImage=$request->file('second_image')->store('public/ads');
        $thirdImage=$request->file('third_image')->store('public/ads');
        $data['first_image']=$firstImage;
        $data['second_image']=$secondImage;
        $data['third_image']=$thirdImage;
        $data['slug']=Str::slug($request->name);
        $data['user_id']=auth()->user()->id;

        Advertisement::create($data);
        return "created";
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

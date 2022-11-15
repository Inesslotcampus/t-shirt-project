<?php

namespace App\Http\Controllers;

use App\Models\ChoiceTshirt;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ChoiceTshirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        return view("choiceTshirt.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = ["XS","S","M","L","XL","XXL"];
        $sourcesImages = ["/image/motif/triangle-multicolor-PNG.png","/image/motif/triangle-noir.png","/image/motif/triangles-multicolors.png"];
        return view("choiceTshirt.create",["size"=>$size, "sourcesImages"=> $sourcesImages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function show(ChoiceTshirt $choiceTshirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function edit(ChoiceTshirt $choiceTshirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChoiceTshirt $choiceTshirt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChoiceTshirt $choiceTshirt)
    {
        //
    }
}

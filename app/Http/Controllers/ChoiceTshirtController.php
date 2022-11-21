<?php

namespace App\Http\Controllers;

use App\Models\ChoiceTshirt;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;



class ChoiceTshirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayOfTshirt = ChoiceTshirt::latest()->get();


        return view("choiceTshirt.index", compact("arrayOfTshirt"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $size = ["XS", "S", "M", "L", "XL", "XXL"];
        $sourcesImages = [
            "triangle-multicolor-PNG.png",
            "triangle-noir.png"
        ];
        return view("choiceTshirt.create", ["size" => $size, "sourcesImages" => $sourcesImages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function showImage(string $motif)
    {
        //affichage à la vollée
        $motif = 'image/motif/' . $motif;
        $logo = ImageManagerStatic::make($motif)->resize(200, 200);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg')->resize(900, 900);
        $img->insert($logo, 'center');
        return $img->response('jpg');
    }

    public function tshirt(Request $request)
    {

        return view("choiceTshirt.tShirtDetail", ["request" => $request]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'size' => 'required|string',
            "pathImg" => 'required',
            "genre" => 'required',
        ]);


        $motif = $request->pathImg;
        $motif = 'image/motif/' . $motif;
        $nameTshirt = Str::random(6);
        $logo = ImageManagerStatic::make($motif)->resize(700, 700);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg');
        $img->insert($logo, 'center');
        $img->save('image/create-T-shirt/t-shirt-' . $nameTshirt . '.jpg');


        ChoiceTshirt::create([
            "title" => $request->size,
            "urlimg" => "image/create-T-shirt/t-shirt-" . $nameTshirt . '.jpg',
            "type" => $request->genre,
        ]);

        $arrayOfTshirt = ChoiceTshirt::latest()->get();


        return view("choiceTshirt.index", compact("arrayOfTshirt"));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function show(ChoiceTshirt $choiceTshirt)
    {
        $size = ["XS", "S", "M", "L", "XL", "XXL"];
        $sourcesImages = [
            "image/motif/triangle-multicolor-PNG.png",
            "image/motif/triangle-noir.png"
        ];
        return view("choiceTshirt.edit", ["size" => $size, "sourcesImages" => $sourcesImages, "tShirt" => $choiceTshirt]);
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
        $this->validate($request, [
            'size' => 'required|string',
            "type" => 'required',
            "genre" => 'required',
        ]);
        $motif = $request->type;

        //$motif = substr($motif,1);

        $logo = ImageManagerStatic::make($motif)->resize(700, 700);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg');
        $img->insert($logo, 'center');
        $url = $choiceTshirt->urlimg;

        $img->save($url);
        $choiceTshirt->update([
            "title" => $request->size,
            "type" => $request->genre,
        ]);

        return $img->response('jpg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoiceTshirt  $choiceTshirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChoiceTshirt $choiceTshirt)
    {
        $choiceTshirt = ChoiceTshirt::find($choiceTshirt->id);
        $image_path = "/images/filename.ext";  // Value is not URL but directory file path


        $choiceTshirt->delete();


        return redirect(route('choiceTshirt.index'));
    }
}

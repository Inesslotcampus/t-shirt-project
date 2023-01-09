<?php

namespace App\Http\Controllers;

use App\Models\ChoiceTshirt;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        $motif =  storage_path('app/public/image/motif/'. $motif);
        $logo = ImageManagerStatic::make($motif)->resize(200, 200);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg')->resize(900, 900);
        $img->insert($logo, 'center');
        return $img->response('jpg');
    }

    public function tshirt(Request $request)
    {
       $input = $request->all();
       
       if($request->hasFile('upload')){
           $destination_path ='public/image/motif';
           $img = $request->file('upload');
           $image_name = $img->getClientOriginalName();
           $path =$request->file('upload')->storeAs($destination_path,$image_name);

           $input['upload']= $image_name;
       }

        return view("choiceTshirt.tShirtDetail", ["input"=>$input]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'size' => 'required|string',
            "pathImg" => 'required',
            "genre" => 'required',
        ]);

        $motif = $request->pathImg;
        $motif =  storage_path('app/public/image/motif/'. $motif);
        $nameTshirt = Str::random(6);
        $logo = ImageManagerStatic::make($motif)->resize(700, 700);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg');
        $img->insert($logo, 'center');
        $img->text('© 2016-2022 positronX.io - All Rights Reserved', 1000, 2000, function($font) { 
            $font->size(1000);  
            $font->align('center');  
            $font->valign('bottom');  
            $font->angle(90);  
        });  
        $img->save('image/create-T-shirt/t-shirt-' . $nameTshirt . '.jpg');
        ChoiceTshirt::create([
            "title" => $request->size,
            "urlimg" => 't-shirt-' . $nameTshirt . '.jpg',
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
        
        $urlOld=$choiceTshirt->urlimg;
        $historique =[];
        
        array_push( $historique, $urlOld);
        $url=last($historique);
        
        
       
        return view("choiceTshirt.edit", [  "tShirt" => $choiceTshirt, "url"=>$url]);
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
        $oldImg = $request->imgEdit;
        
        $this->validate($request, [
            "imgEdit"=>'required'
        ]);
    
        $historique =[];

        array_push( $historique,$oldImg);
        
        
        /* upload de l'image */
        if($request->hasFile('upload')){
            $destination_path ='public/image/motif';
            $img = $request->file('upload');
            $image_name = $img->getClientOriginalName();
            $path =$request->file('upload')->storeAs($destination_path,$image_name);
 
            $input['upload']= $image_name;
            
        }
        $path =  storage_path('app/public/image/motif/'. $image_name);
            $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg');
            $motif = ImageManagerStatic::make($path)->resize(700, 700);
            $img->insert($motif, 'center');
            $img->insert($motif, 'center');
            $img->save('image/create-T-shirt/t-shirt-' . $image_name . '.jpg');
            

            $newTshirt= 't-shirt-' . $image_name . '.jpg';

            array_push( $historique,$newTshirt);

            $choiceTshirt->update([
            "urlimg" =>  $historique,
        ]);
            
            return $img->response('jpg');

        // $url = $choiceTshirt->urlimg;

        // $img->save($url);

        /* ajouter le tableau avec plusieurs valeurs à la base de donnée à la place*/ 
        

        // return $img->response('jpg');
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

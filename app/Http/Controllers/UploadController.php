<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function uploidImage(string $uploidMotif){
          //upload image
          
          $nameTshirt = Str::random(6);
          //$motif = ImageManagerStatic::make($uploidMotif);
          $motif = ImageManagerStatic::make('');
          dd($motif);
          
          $motif->save('image/motif' . $nameTshirt . '.jpg');


  
          //affichage à la vollée
  
          $motif = 'image/motif/' . $motif;
          $logo = ImageManagerStatic::make($motif)->resize(200, 200);
          $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg')->resize(900, 900);
          $img->insert($logo, 'center');
          return $img->response('jpg');

    }

}

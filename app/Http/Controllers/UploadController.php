<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function uploidImage(string $uploidMotif){
         
          //affichage à la vollée
          $motif =  storage_path('app/public/image/motif/'.$uploidMotif);
          $logo = ImageManagerStatic::make($motif)->resize(200, 200);
          $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg')->resize(900, 900);
          $img->insert($logo, 'center');
          return $img->response('jpg');

    }
    public function editUploidImage(string $uploidMotif){
         
        //affichage à la vollée
        $motif =  storage_path('app/public/image/motif/'.$uploidMotif);
        $logo = ImageManagerStatic::make($motif)->resize(200, 200);
        $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg')->resize(900, 900);
        $img->insert($logo, 'center');
        return $img->response('jpg');

  }

}

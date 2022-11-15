<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoiceTshirtController;
use Intervention\Image\ImageManagerStatic;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $img = ImageManagerStatic::make('image/t-shirt-blanc.jpg');
    return $img->response('jpg');
 
});
Route::resource('choiceTshirt',ChoiceTshirtController::class);


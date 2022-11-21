<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoiceTshirtController;
use Intervention\Image\ImageManagerStatic;
use Symfony\Component\Console\Question\ChoiceQuestion;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadController;

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
Route::get('/choiceTshirt/resultUpload/{motif}',[UploadController::class, 'uploidImage'])->name('choiceTshirt.uploadResult');
Route::get('/choiceTshirt/result/{motif}',[ChoiceTshirtController::class, 'showImage'])->name('choiceTshirt.result');
Route::get('/choiceTshirt/show/{motif}',[PdfController::class, 'downloadPDF'])->name('pdf.displayTshirt');
Route::resource('choiceTshirt',ChoiceTshirtController::class);

Route::post('/choiceTshirt/show',[ChoiceTshirtController::class, 'tshirt'])->name('choiceTshirt.showImage');




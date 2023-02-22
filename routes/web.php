<?php

use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\masterRedirect;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testing;
use App\Telegram\Commands\Forms\GenerateCommand;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Support\Carbon;
use App\Telegram\Commands\Forms\TestCommand;
use AshAllenDesign\ShortURL\Controllers\ShortURLController;



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

Route::get('test',[testing::class,'index']);
Route::get('test2',function(){
   return "hello";
});
Route::get('form/{shortURLKey}',function($shortURLKey){

    $shortURLKey = $shortURLKey;
    $url =ShortURL::where('url_key',$shortURLKey)->first();
    return view('formpage',get_defined_vars());
});
Route::get('/{shortURLKey}', ShortURLController::class)->middleware('isForm');
 Route::get('/short/{shortURLKey}',[masterRedirect::class,'index'])->middleware('isForm');
 Route::get('formpage',function(){
  
    return view('FormPage');

 });
 Route::Post('submit', [LeadController::class,'index']);

// Route::get('/{shortURLKey}/lansdp', function($shortURLKey){
// 

//     return view('loading',['url'=>$finalurl_key]);
// });


// Route::get('test',[TestCommand::class,'handle']);

Route::get('redirectpage/{shortURLKey}', function($shortURLKey){
    return view('redirectpage',['url'=>$shortURLKey]);
});
Route::post('addlead',[LeadController::class,'create']);

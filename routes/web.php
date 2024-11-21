<?php

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use App\Models\Municipio;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

/*Route::get( '/', function () {
return view( 'site' );
*/
Route::get( '/', [ Controller::class, 'index' ] );
Route::get('/listview', [Controller::class, 'indexView']);
Route::get( '/sobre', [ Controller::class, 'sobre' ] );
Route::get( '/contacto', [ Controller::class, 'contacto' ] );
Route::get( '/detail/{id}', [ Controller::class, 'details' ] );
Route::get( '/vendajs', [ Controller::class, 'Properties_Venda' ] );
Route::get( '/rendajs', [ Controller::class, 'Properties_aluguer' ] );

Route::get( '/venda', [ Controller::class, 'Properties_Vendajs' ] );
Route::get( '/renda', [ Controller::class, 'Properties_aluguerjs' ] );
Route::get( '/search', [ Controller::class, 'searchProperties' ] )->name( 'properties.search' );
Route::get( '/properties/type/{type_id}', [ Controller::class, 'propertie_types' ] )->name( 'properties.searchByType' );
Route::post( '/submit-visit', [ Controller::class, 'submitVisit' ] )->name( 'submitVisit' );

Route::get( '/verify/{phone}', [ Controller::class, 'showVerificationForm' ] )->name( 'verify.phone' );
//Route::post( '/verifysubmit', [ Controller::class, 'verifyPhone' ] )->name( 'verify-phone.submit' );
Route::post( '/verify-phone/resend', [ Controller::class, 'resendCode' ] )->name( 'verify-phone.resend' );


Route::get('/get-municipios/{province_id}', function ($province_id) {
  $municipios = Municipio::where('provincia_id', $province_id)->get();
  return response()->json($municipios);
});

Route::get('/get-distritos/{municipio_id}', function ($municipio_id) {
  $distritos = Distrito::where('municipio_id', $municipio_id)->get();
  return response()->json($distritos);
});

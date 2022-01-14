<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Models\AllPrices;


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
//    return view('auth.login');
    return redirect()->route('price_sheet.index');
});



Route::get('/drop_them', function () {
    $res = AllPrices::where('date','2021-11-02')->delete();
    return $res;
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');;
Route::get('/logout', [\App\Http\Auth\Controllers\CustomAuthController::class, 'signOut'])->middleware(['auth'])->name('signOut');


Route::resource('companies', CompanyController::class)->middleware(['auth']);
Route::resource('vfex', \App\Http\Controllers\VFEXController::class)->middleware(['auth']);
Route::resource('etfs', \App\Http\Controllers\ETFController::class)->middleware(['auth']);

Route::resource('all_listings', \App\Http\Controllers\ListingsController::class)->middleware(['auth']);

Route::resource('price_sheet', \App\Http\Controllers\PriceSheetController::class)->middleware(['auth']);


Route::resource('zse_index', \App\Http\Controllers\ZSEIndexController::class)->middleware(['auth']);
Route::resource('top_shareholders', \App\Http\Controllers\TopShareholdersController::class)->middleware(['auth']);

Route::resource('historic_price', \App\Http\Controllers\HistoricPriceController::class)->middleware(['auth']);

Route::resource('reports', \App\Http\Controllers\Dashboard\ReportsController::class)->middleware(['auth']);





//Route::get('/price_sheet', [\App\Http\Controllers\PriceSheetController::class, 'index'])->middleware(['auth'])->name('price_sheet');

Route::get('/balance_sheet', [\App\Http\Controllers\BalanceSheetController::class, 'index'])->middleware(['auth'])->name('balance_sheet');

Route::post('/excel_sheets', [\App\Http\Controllers\UploadDataController::class, 'store'])->middleware(['auth'])->name('excel_sheets.store');
Route::get('/excel_sheets', [\App\Http\Controllers\UploadDataController::class, 'index'])->middleware(['auth'])->name('excel_sheets');

Route::get('/price_sheet_import', [\App\Http\Controllers\PriceSheetImportController::class, 'index'])->middleware(['auth'])->name('price_sheet_import.import');
Route::post('/price_sheet_import', [\App\Http\Controllers\PriceSheetImportController::class, 'store'])->middleware(['auth'])->name('price_sheet_import.store');
Route::post('/price_sheet_vfx_import', [\App\Http\Controllers\PriceSheetImportController::class, 'store_vfex'])->middleware(['auth'])->name('price_sheet_vfx_import.store');
Route::post('/price_sheet_etf_import', [\App\Http\Controllers\PriceSheetImportController::class, 'store_etf'])->middleware(['auth'])->name('price_sheet_etf_import.store');


Route::get('/settings', [\App\Http\Controllers\Dashboard\SettingsController::class, 'index'])->middleware(['auth'])->name('settings.index');
Route::get('/library', [\App\Http\Controllers\Dashboard\LibraryController::class, 'index'])->middleware(['auth'])->name('library.index');
Route::get('/news', [\App\Http\Controllers\Dashboard\NewsController::class, 'index'])->middleware(['auth'])->name('news.index');
//Route::get('/reports', [\App\Http\Controllers\Dashboard\ReportsController::class, 'index'])->middleware(['auth'])->name('reports.index');


Route::post('/companies/summary/update/{id}', [\App\Http\Controllers\ZSECompanies\CompanySummaryController::class, 'update'])->middleware(['auth'])->name('summary.update');


Route::get('company_logo/form/{id}', [\App\Http\Controllers\CompanyLogoController::class, 'create'])->middleware(['auth'])->name('company_logo.create');
Route::post('company_logo/save/{id}', [\App\Http\Controllers\CompanyLogoController::class, 'store'])->middleware(['auth'])->name('company_logo.store');


//Route::get('generate-pdf', [PDFController::class, 'generatePDF']);


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});




Route::get('call-procedure', function () {

    $trade_value = DB::select(
        'CALL get_trade_value()'
    );
    $valueCompanies = array();
    foreach ($trade_value as $value){
        $company = \App\Models\Company::find($value->company_id);
        $company->trade_value = $value->TradeValue;
        $valueCompanies[] = $company;
    }

    $trade_volume = DB::select(
        'CALL get_trade_volume()'
    );

    $volumeCompanies = array();
    foreach ($trade_volume as $value){
        $company = \App\Models\Company::find($value->company_id);
        $company->trade_value = $value->TradeValue;
        $volumeCompanies[] = $company;
    }

    $data = [
        "trade_values" => $valueCompanies,
        "trade_volumes" => $volumeCompanies,
    ];

    return $data;

});

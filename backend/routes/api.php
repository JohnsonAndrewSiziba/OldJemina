<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('price_sheet', \App\Http\Controllers\PriceSheetApiController::class);
Route::resource('historic_data', \App\Http\Controllers\HistoricDataAPIController::class);
Route::resource('etf_historic_data', \App\Http\Controllers\ETFHistoricDataAPIController::class);
Route::resource('vfex_historic_data', \App\Http\Controllers\VFEXHistoricDataAPIController::class);
Route::resource('companies', \App\Http\Controllers\CompanyAPIController::class);
Route::resource('company_snippet', \App\Http\Controllers\CompanySnippetAPIController::class);
Route::resource('reports_snippet', \App\Http\Controllers\GetTopReportsAPIController::class);
Route::resource('list', \App\Http\Controllers\ShowCompaniesListAPIController::class);
Route::resource('top_shareholders', \App\Http\Controllers\TopShareholdersAPIController::class);
Route::resource('sheet_dates', \App\Http\Controllers\PriceSheet\SheetDatesAPIController::class);
Route::resource('reports', \App\Http\Controllers\ReportsAPIController::class);
Route::resource('sector_composition', \App\Http\Controllers\SectorCompositionAPIController::class);
Route::resource('featured_companies', \App\Http\Controllers\FeaturedCompaniesAPIController::class);
Route::resource('messages', \App\Http\Controllers\MessagesAPIController::class);


Route::get('/price_sheet/summary/{id}', [\App\Http\Controllers\PriceSheetApiController::class, 'priceSheetSummary']);
Route::get('/etf/price_sheet/summary/{id}', [\App\Http\Controllers\PriceSheetApiController::class, 'ETFPriceSheetSummary']);
Route::get('/vfex/price_sheet/summary/{id}', [\App\Http\Controllers\PriceSheetApiController::class, 'VFEXPriceSheetSummary']);
Route::get('/weekly_reports/statistics', [\App\Http\Controllers\Reports\DisplayWeeklyReportAPIController::class, 'getStatistics']);
Route::get('/get_report_text/{id}/{start_date}/{end_date}/{type_id}', [\App\Http\Controllers\Reports\GetReportTextController::class, 'getReportText']);
Route::get('/companies_page', [\App\Http\Controllers\CompaniesPageAPIController::class, 'index']);

Route::get('/daily_reports', [\App\Http\Controllers\DailyReportsAPIController::class, 'index']);

Route::get('/weekly_reports', [\App\Http\Controllers\WeeklyReportsAPIController::class, 'index']);

Route::get('/monthly_reports', [\App\Http\Controllers\MonthlyReportsAPIController::class, 'index']);

Route::get('/featured_reports', [\App\Http\Controllers\FeaturedReportsAPIController::class, 'index']);


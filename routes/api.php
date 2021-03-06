<?php declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\ArticleController;

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

Route::controller(NewsSourceController::class)->group(function () {
    Route::get('/newsSources/index', 'index');
    Route::post('/newsSources/create', 'store');
});


Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles/index', 'index');
    Route::post('/articles/create', 'store');
});

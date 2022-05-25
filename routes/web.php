<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AppDownloadController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
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
Route::get('/setlang/{lang}', function ($locale) {
    if (in_array($locale, Config::get('app.locales')))
    {
        Session::put('locale', $locale);
    }
    $route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    return redirect()->route($route, ['lang' => $locale]);
});

Route::redirect('/', '/'.substr(request()->server('HTTP_ACCEPT_LANGUAGE'), 0, 2));

Route::get('/{lang}', [ RoutesController::class, 'IndexPage' ])->name('index');

Route::get('/{lang}/prices', [ RoutesController::class, 'PricesPage' ])->name('prices');

Route::get('/{lang}/tutorial', [ RoutesController::class, 'TutorialPage' ])->name('tutorial');

Route::get('/releases/latest/{os}',[ AppDownloadController::class, 'AppDownload' ]) ->name('download');



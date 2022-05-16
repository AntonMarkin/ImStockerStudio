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
    return redirect()->back();
});

Route::redirect('/', '/'.App::currentLocale());
Route::get('/{land}', [ RoutesController::class, 'IndexPage' ])->name('index');

Route::get('/{lang}/prices', [ RoutesController::class, 'PricesPage' ])->name('prices');

Route::get('/{lang}/tutorial', [ RoutesController::class, 'TutorialPage' ])->name('tutorial');

Route::get('/releases/latest/{os}',[ AppDownloadController::class, 'AppDownload' ]) ->name('download');

    //ZX\Router::AddRoute('/', __CLASS__ . "::Index");
    //ZX\Router::AddRoute('/ru', __CLASS__ . "::Index", ['lang' => 'ru']);
    //ZX\Router::AddRoute('/en', __CLASS__ . "::SetEnLang");
    //ZX\Router::AddRoute('/en/tutorial', __CLASS__ . "::Tutorial", ['lang' => 'en']);
    //ZX\Router::AddRoute('/ru/tutorial', __CLASS__ . "::Tutorial", ['lang' => 'ru']);
    //ZX\Router::AddRoute('/en/prices', __CLASS__ . "::Prices", ['lang' => 'en']);
    //ZX\Router::AddRoute('/ru/prices', __CLASS__ . "::Prices", ['lang' => 'ru']);
    //ZX\Router::AddRoute('/en/license', __CLASS__ . "::StaticPage");
    //ZX\Router::AddRoute('/ru/license', __CLASS__ . "::StaticPage", ['lang' => 'ru']);
    //ZX\Router::AddRoute('/tutorial/update', __CLASS__ . "::TutorialUpdate");

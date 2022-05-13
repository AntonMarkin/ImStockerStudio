<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\MenuElement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class RoutesController extends Controller
{
    public function GetFooterMenu()
    {
        $footerMenu = DB::table('menu_elements')
            ->where('in_footer', '=',1)
            ->get();
        return $footerMenu;
    }
    public function GetHeaderMenu()
    {
        $headerMenu = DB::table('menu_elements')
            ->where('in_header', '=',1)
            ->get();
        return $headerMenu;
    }
    public function SetLang()
    {
        App::setLocale('ru');
        return [
            'current' => 'ru',
            'noncurrent' => 'en',
        ];
    }

    public function IndexPage(Request $request)
    {

        $lang = $this->SetLang();
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $latestInfo = AppDownloadController::GetLatestInfo();

        return view('index_page', compact('latestInfo', 'footerMenu', 'headerMenu', 'lang'));
    }
    public function PricesPage()
    {
        $lang = $this->SetLang();
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $productFeatures = PricesController::GetProFeatures(null, 'studio');

        return view('prices_page', compact('footerMenu', 'headerMenu', 'lang', 'productFeatures'));
    }
    public function TutorialPage()
    {
        $lang = $this->SetLang();
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $tutorialMenu = TutorialController::GetTutorialMenu();
        $tutorialContent = TutorialController::GetTutorialContent();

        return view('tutorial_page', compact('tutorialContent', 'tutorialMenu', 'headerMenu', 'footerMenu', 'lang'));
    }
}

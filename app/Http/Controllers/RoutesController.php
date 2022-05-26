<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\MenuElement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Torann\GeoIP\Facades\GeoIP;

class RoutesController extends Controller
{


    public function GetFooterMenu()
    {
        $footerMenu = DB::table('menu_elements')
            ->where('in_footer', '=',1)
            ->orderBy('order')
            ->get();
        return $footerMenu;
    }
    public function GetHeaderMenu()
    {
        $headerMenu = DB::table('menu_elements')
            ->where('in_header', '=',1)
            ->orderBy('order')
            ->get();
        return $headerMenu;
    }

    public function IndexPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $latestInfo = AppDownloadController::GetLatestInfo();

        
        //dd(geoip()->getLocation('94.181.96.230'));
        if(\geoip('94.181.96.230')['continent'] = 'EU')
        {
            $is_eea_country = true;
        }
        else $is_eea_country = false;

        return view('index_page', compact('latestInfo', 'footerMenu', 'headerMenu', 'is_eea_country'));
    }
    public function PricesPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $productFeatures = PricesController::GetProFeatures(null, 'studio');
        $productPlans = PricesController::GetProductPlans();

        return view('prices_page', compact('footerMenu', 'headerMenu', 'productFeatures','productPlans'));
    }
    public function TutorialPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $tutorialMenu = TutorialController::GetTutorialMenu();
        $tutorialContent = TutorialController::GetTutorialContent();

        return view('tutorial_page', compact('tutorialContent', 'tutorialMenu', 'headerMenu', 'footerMenu'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\MenuElement;

class RoutesController extends Controller
{
    public function GetFooterMenu()
    {
        $footerMenu = MenuElement::all()
            ->where('in_footer', '=','true');
        return $footerMenu;
    }
    public function GetHeaderMenu()
    {
        $headerMenu = MenuElement::all()
            ->where('in_header', '=','true');
        return $headerMenu;
    }

    public function IndexPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        $latestInfo = AppDownloadController::GetLatestInfo();
        return view('index_page', compact('latestInfo', 'footerMenu', 'headerMenu'));
    }
    public function LicensePage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        return view('license_page', compact('footerMenu', 'headerMenu'));
    }
    public function PricesPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        return view('prices_page', compact('footerMenu', 'headerMenu'));
    }
    public function TutorialPage()
    {
        $headerMenu = $this->GetHeaderMenu();
        $footerMenu = $this->GetFooterMenu();
        return view('tutorial_page', compact('footerMenu', 'headerMenu'));
    }
    public function TutorialUpdate()
    {

    }
}

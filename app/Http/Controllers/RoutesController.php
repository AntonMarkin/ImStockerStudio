<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RoutesController extends Controller
{
    public function IndexPage()
    {

        return view('index_layout');
    }
    public function LicensePage()
    {
        return view('license_layout');
    }
    public function PricesPage()
    {
        return view('prices_layout');
    }
    public function TutorialPage()
    {
        return view('tutorial_layout');
    }
    public function TutorialUpdate()
    {

    }
}

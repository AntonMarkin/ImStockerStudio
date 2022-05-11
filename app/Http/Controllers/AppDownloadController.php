<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;

class AppDownloadController extends Controller
{
    public static function GetLatestInfo()
    {
        $latest_win = Yaml::parseFile('releases/latest.yml');
        $latest_mac = Yaml::parseFile('releases/latest-mac.yml');

        $latestInfo = [
            'win' => [
                'version' => $latest_win['version'],
                'file' => $latest_win['path'],
                'url' => '/releases/' . $latest_win['path'],
                'sizeMB' => ceil($latest_win['files']['0']['size'] /1024 /1024),
            ],
            'mac' => [
                'version' => $latest_mac['version'],
                'file' => $latest_mac['path'],
                'url' => '/releases/' . $latest_mac['path'],
                'sizeMB' => ceil($latest_mac['files']['0']['size'] /1024 /1024),
            ],
        ];
        return $latestInfo;
    }
    public function AppDownload(Request $request)
    {
        $latest = self::GetLatestInfo();

        if($request->is('*/latest/win'))
        {
            return redirect($latest['win']['url']);
        }
        elseif ($request->is('*/latest/mac'))
        {
            return redirect($latest['mac']['url']);
        }

        return abort(404);
    }
}

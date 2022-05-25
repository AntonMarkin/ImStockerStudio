<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\HtmlString;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;

class TutorialController extends Controller
{
    public static function GetTutorial()
    {
        $config = [
            'table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'top',
                'style' => 'bullet',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
                'normalize' => 'relative',
                'placeholder' => null,
            ],
        ];
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new TableOfContentsExtension());
        $converter = new MarkdownConverter($environment);

        $tutorial = $converter->convert(file_get_contents('tutorial/'.App::currentLocale().'.md'));
        $tutorial = str_replace('[[PRO]]','<span class="pro">PRO</span>',$tutorial);
        $tutorial = preg_replace_callback('/\\[\\[YOUTUBE=(.*?)\\]\\]/',
            function($matches)
            {
                $address='<iframe class="youtube" width="560" height="315" src="https://www.youtube.com/embed/'.htmlspecialchars ($matches[1]).'"title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                return $address;
            }
            ,$tutorial);

        return $tutorial;
    }
    public static function GetTutorialContent()
    {
        $tutorial = self::GetTutorial();
        $tutorialContent = substr($tutorial, strrpos($tutorial, '<h1>'));

        return new HtmlString($tutorialContent);
    }
    public static function GetTutorialMenu()
    {
        $tutorial = self::GetTutorial();
        $tutorialMenu = substr($tutorial, 0, strrpos($tutorial, '<h1>'));
        $pos = 0;
        for($i = 1; $i <= substr_count($tutorialMenu, '<ul>', 30); $i++)
        {
            $pos = strpos($tutorialMenu, '<a', $pos);
            $tutorialMenu = substr_replace($tutorialMenu, '<a class="tutorialPage-menu-link level-2"', $pos, 2);
            $tutorialMenu = substr_replace($tutorialMenu, $i.'.', strrpos($tutorialMenu, '\">', $pos), 0);
            $pos = strpos($tutorialMenu, '</a>', $pos);

            $lvl2Count = substr_count($tutorialMenu, '<li>', $pos, strpos($tutorialMenu, '</ul>', $pos)-$pos);
            for($j = 1; $j <= $lvl2Count; $j++)
            {

                $pos = strpos($tutorialMenu, '<a', $pos);
                $tutorialMenu = substr_replace($tutorialMenu, '<a class= "tutorialPage-menu-link level-3"', $pos, 2);
                $pos++;
            }
        }

        $tutorialMenu = substr_replace($tutorialMenu, '<div class="level-1"> Руководство по ImStocker Studio</div>', 0, 0);

        return new HtmlString($tutorialMenu);
    }
}

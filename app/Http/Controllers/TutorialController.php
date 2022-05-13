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
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new TableOfContentsExtension());
        $converter = new MarkdownConverter($environment);

        $tutorial = $converter->convert(file_get_contents('tutorial/'.App::currentLocale().'.md'));

        return $tutorial;
    }
    public static function GetTutorialContent()
    {
        $tutorial = self::GetTutorial();
        $tutorialContent = new HtmlString(substr($tutorial, strrpos($tutorial, '<h1>')));
        return $tutorialContent;
    }
    public static function GetTutorialMenu()
    {
        $tutorial = self::GetTutorial();
        $tutorialMenu = new HtmlString(substr($tutorial, 0, strrpos($tutorial, '<h1>')));
        return $tutorialMenu;
    }
}

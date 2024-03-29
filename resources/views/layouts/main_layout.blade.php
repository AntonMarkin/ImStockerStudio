<!doctype html>
<html lang="{{\Illuminate\Support\Facades\App::currentLocale()}}">
<head>
    <title>{{__('seo.title')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{__('seo.description')}}">
    <meta name="keywords" content="{{__('seo.keywords')}}">
    <meta name="og:type" content="website">
    <meta name="og:url" content="studio.imstocker.com">
    <meta name="og:title" content="{{__('seo.title')}}">
    <meta name="og:description" content="{{__('seo.description')}}">
    <meta name="og:image" content="/images/og_logo_studio.png">
    <meta name="og:image:width" content="1200">
    <meta name="og:image:height" content="536">
    <meta name="twitter:card" content="{{__('seo.title')}}">
    <meta name="twitter:site" content="studio.imstocker.com">
    <meta name="twitter:creator" content="@imstocker">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

</head>
<body>
@if($is_eea_country)
@include('cookie_consent')
<!--Yandex.Metrika counter-->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        }
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(21447229, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>

@elseif(!$is_eea_country)}}
<noscript>
    <div><img src="https://mc.yandex.ru/watch/21447229" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
@endif

<!-- /Yandex.Metrika counter -->


<div class="site-lang-{{\Illuminate\Support\Facades\App::currentLocale()}}">
    <header class="SiteHeader shadowed-block">
        <div class="SiteHeader-left">
            <a href="https://imstocker.com/{{\Illuminate\Support\Facades\App::currentLocale()}}"
               class="SiteHeader-logo"></a>
            <div class="SiteHeader-menu">
                <a href="/" class="SiteHeader-menu-one state-active" title="{{__('pageIndex.imsStudioSubCaption')}}">
                    <span class="SiteHeader-menu-one-caption">Studio</span>
                </a>
                <a href="https://imstocker.com/{{\Illuminate\Support\Facades\App::currentLocale()}}/keyworder"
                   class="SiteHeader-menu-one" title="{{__('pageIndex.imsKeyworderSubCaption')}}">
                    <span class="SiteHeader-menu-one-caption">Keyworder</span>
                </a>
            </div>
        </div>
        <div class="SiteHeader-center">
            <div class="SiteHeader-center-link">
                <a href="/{{\Illuminate\Support\Facades\App::currentLocale()}}">- ImStocker -</a>
            </div>
        </div>
        <div class="SiteHeader-right SiteHeader-menu">

            @foreach($headerMenu as $element)
                @if($element->in_header)
                    @if(\Illuminate\Support\Facades\App::currentLocale()=='en')
                        @if($element->is_studio)
                            <a href="/en{{$element->url}}"
                        @else
                            <a href="https://imstocker.com/en{{$element->url}}"
                               @endif
                               class="SiteHeader-menu-one ">
                                <span class="SiteHeader-menu-one-caption">{{$element->name_en}}</span>
                            </a>
                            @else
                                @if($element->is_studio)
                                    <a href="/ru{{$element->url}}"
                                @else
                                    <a href="https://imstocker.com/ru{{$element->url}}"
                                       @endif
                                   class="SiteHeader-menu-one ">
                                    <span class="SiteHeader-menu-one-caption">{{$element->name_ru}}</span>
                                </a>
                            @endif
                        @endif
                        @endforeach

                        <div class="SiteHeader-menu-one state-active SiteHeader-menu-lang-switch">
                            <span
                                class="SiteHeader-menu-one-caption">{{\Illuminate\Support\Facades\App::currentLocale()}}</span>
                            @foreach(\Illuminate\Support\Facades\Config::get('app.locales') as $locale)
                                @if(\Illuminate\Support\Facades\App::currentLocale() != $locale)
                                    <div class="SiteHeader-menu-lang-switch-options">
                                        <a rel="nofollow" href="/setlang/{{$locale}}"
                                           class="SiteHeader-menu-lang-switch-options-one">
                                            {{$locale}}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="SiteHeader-menu-sidebarButton" onclick="sidebarToggle()">
                            <div class="SiteHeader-menu-sidebarButton-bar"></div>
                            <div class="SiteHeader-menu-sidebarButton-bar"></div>
                            <div class="SiteHeader-menu-sidebarButton-bar"></div>
                        </div>
        </div>
    </header>
    <div class="SiteMain">
        @yield('content')
    </div>
    <footer class="SiteFooter">

        <div class="layout-center">

            <div class="footerLink-contacts">
                <div class="ims-cntc">
                    <a href="https://imstocker.com" class="footerLink-head">ImStocker</a>
                    @foreach($footerMenu as $element)
                        @if($element->in_footer && !$element->is_studio)
                            @if(\Illuminate\Support\Facades\App::currentLocale()=='en')
                                <a href="https://imstocker.com/en{{$element->url}}"
                                   class="footer-links">{{$element->name_en}}</a>
                            @else
                                <a href="https://imstocker.com/ru{{$element->url}}"
                                   class="footer-links">{{$element->name_ru}}</a>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="ims-cntc-studio">
                    <a href="/" class="footerLink-head">ImStocker Studio</a>
                    @foreach($footerMenu as $element)
                        @if($element->in_footer && $element->is_studio)
                            @if(\Illuminate\Support\Facades\App::currentLocale()=='en')
                                <a href="https://imstocker.com/en{{$element->url}}"
                                   class="footer-links">{{$element->name_en}}</a>
                            @else
                                <a href="https://imstocker.com/ru{{$element->url}}"
                                   class="footer-links">{{$element->name_ru}}</a>
                            @endif
                        @endif
                    @endforeach
                    <a href="https://imstocker.com/{{\Illuminate\Support\Facades\App::currentLocale()}}/account/cabinet"
                       class="footer-links">{{__('menu.cabinet')}}</a>
                </div>
            </div>

            <div class="SiteFooter-social">
                <div class="SiteFooter-copyright">
                    &copy; IMSTOCKER.COM. {{__('common.footerRights')}}. 2017-2022
                </div>
                <div class="SiteFooter-social-facebook">
                    <a href="https://www.facebook.com/groups/imstocker" target="_blank" rel="nofollow">
                        Facebook
                    </a>
                </div>
                @if(\Illuminate\Support\Facades\App::isLocal('ru'))
                    <div class="SiteFooter-social-vk">
                        <a href="https://vk.com/imstockercom" target="_blank" rel="nofollow">
                            ВКонтакте
                        </a>
                    </div>
                    <div class="SiteFooter-social-instagram">
                        <a href="https://www.instagram.com/imstocker.ru/" target="_blank" rel="nofollow">
                            Instagram
                        </a>
                    </div>
                @elseif(\Illuminate\Support\Facades\App::isLocal('en'))
                    <div class="SiteFooter-social-instagram">
                        <a href="https://www.instagram.com/imstockercom/" target="_blank" rel="nofollow">
                            Instagram
                        </a>
                    </div>
                @endif
                <iframe
                    src="https://platform.twitter.com/widgets/follow_button.html?screen_name=imstocker&show_screen_name=false&show_count=false&size=l"
                    title="Follow ImStocker on Twitter"
                    width="90"
                    height="40"
                    style="border: 0; overflow: hidden;"
                ></iframe>
            </div>
        </div>
    </footer>

    <!--<div class="SiteSidebar" onclick="sidebarClose()">
        <div class="SiteSidebar-menu">
            <div class="SiteSidebar-menu-lang-switch">
                <div class="SiteSidebar-menu-lang-switch-caption">
                    {$T.common.language.switchCaption}}
                </div>
                <div class="SiteSidebar-menu-lang-switch-options">
                        <span
                            class="SiteSidebar-menu-lang-switch-options-one state-selected"
                        >
                            {$LANG}}
                        </span>

                    {<list($main.languageList)}}
                    {<elem if($LANG !== @value.name)}}
                    <a
                        rel="nofollow"
                        href="{@value.link}}"
                        class="SiteSidebar-menu-lang-switch-options-one"
                    >
                        {@value.name}}
                    </a>
                    {/elem}}
                    {/list}}

                </div>
            </div>
            {list($main.menuList)}}
     <a
                href="{@value.to}}"
                class="SiteSidebar-menu-one {'type-important' if(@value.important > 1)}} {'state-active' if(@value.active)}}"
            >
                {<elem if(@value.icon)}}
                <span class="{@value.icon}}}"></span>
                {/elem}}
                <span class="SiteHeader-menu-one-caption">{@value.title}}</span>
            </a>

            {/list}}
        </div>
    </div>-->

    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script>
        siteInit();
    </script>
</div>
</body>
</html>

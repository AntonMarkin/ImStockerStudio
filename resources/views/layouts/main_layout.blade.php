<!doctype html>
<html lang="{{$lang['current']}}">
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
    <link rel="icon" type="image/x-icon" href="storage/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="public/css/app.css?220211_1">


</head>
<body>
<!--{<cookie_consent.tpl if($main.user_is_eea_county)>}}-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
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

<!--
if(!$main.user_is_eea_county)}}
<noscript>
    <div><img src="https://mc.yandex.ru/watch/21447229" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
endif
-->

<!-- /Yandex.Metrika counter -->

<div class="site-lang-{{$lang['current']}}">
    <header class="SiteHeader shadowed-block">
        <div class="SiteHeader-left">
            <a href="https://imstocker.com/{{$lang['current']}}"
               class="SiteHeader-logo"></a>
            <div class="SiteHeader-menu">
                <a href="/" class="SiteHeader-menu-one state-active" title="{{__('pageIndex.imsStudioSubCaption')}}">
                    <span class="SiteHeader-menu-one-caption">Studio</span>
                </a>
                <a href="https://imstocker.com/{{$lang['current']}}/keyworder"
                   class="SiteHeader-menu-one" title="{{__('pageIndex.imsKeyworderSubCaption')}}">
                    <span class="SiteHeader-menu-one-caption">Keyworder</span>
                </a>
            </div>
        </div>
        <div class="SiteHeader-center">
            <div class="SiteHeader-center-link">
                <a href="/">- ImStocker -</a>
            </div>
        </div>
        <div class="SiteHeader-right SiteHeader-menu">

            @foreach($headerMenu as $element)
                @if($element->in_header && $element->is_studio)
                    <a href="/{{$lang['current']}}{{$element->url}}"
                       class="SiteHeader-menu-one ">
                        <span class="SiteHeader-menu-one-caption">{{__('menu.'.$element->name)}}</span>
                    </a>
                @elseif($element->in_header && !$element->is_studio)
                    <a href="https://imstocker.com/{{$lang['current']}}{{$element->url}}" class="SiteHeader-menu-one ">
                        <span class="SiteHeader-menu-one-caption">{{__('menu.'.$element->name)}}</span>
                    </a>
                @endif
            @endforeach

            <div class="SiteHeader-menu-one state-active SiteHeader-menu-lang-switch">
                <span class="SiteHeader-menu-one-caption">{{$lang['current']}}</span>
                <div class="SiteHeader-menu-lang-switch-options">
                    <a rel="nofollow" href="/{{$lang['noncurrent']}}" class="SiteHeader-menu-lang-switch-options-one">
                        {{$lang['noncurrent']}}
                    </a>
                </div>

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
                            <a href="https://imstocker.com/{{$lang['current']}}{{$element->url}}" class="footer-links">{{__('menu.'.$element->name)}}</a>
                        @endif
                    @endforeach
                </div>

                <div class="ims-cntc-studio">
                    <a href="/" class="footerLink-head">ImStocker Studio</a>
                    @foreach($footerMenu as $element)
                        @if($element->in_footer && $element->is_studio)
                            <a href="/{{$lang['current']}}{{$element->url}}" class="footer-links">{{__('menu.'.$element->name)}}</a>
                        @endif
                    @endforeach
                    <a href="https://imstocker.com/{{$lang['current']}}/account/cabinet" class="footer-links">{{__('menu.cabinet')}}</a>
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
                @if($lang['current'] == 'ru')
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
                @elseif($lang['current'] == 'en')
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
        -->
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
    <script type="text/javascript" src="/js/main.js?210624_1"></script>
    <script>
        siteInit();
    </script>
</div>
</body>
</html>

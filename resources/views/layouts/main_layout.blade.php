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
    <link rel="icon" type="image/x-icon" href="storage/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css?220211_1">


</head>
<body >
<!--{<cookie_consent.tpl if($main.user_is_eea_county)>}}-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(21447229, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<!--
if()
{<elem if(!$main.user_is_eea_county)}}
<noscript><div><img src="https://mc.yandex.ru/watch/21447229" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
{/elem}}
endif
    -->
<!-- /Yandex.Metrika counter -->

<div class="site-lang-{{\Illuminate\Support\Facades\App::currentLocale()}}">
    <header class="SiteHeader shadowed-block">
        <div class="SiteHeader-left">
            <a href="{{$main.motherSiteIndexLink}}" class="SiteHeader-logo"></a>
            <div class="SiteHeader-menu">
                <a href="/" class="SiteHeader-menu-one state-active" title="{$T.headerMenu.imsStudioSubCaption}}">
                    <span class="SiteHeader-menu-one-caption">Studio</span>
                </a>
                <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/keyworder" class="SiteHeader-menu-one" title="{$T.headerMenu.imsKeyworderSubCaption}}">
                    <span class="SiteHeader-menu-one-caption">Keyworder</span>
                </a>
            </div>
        </div>
        <div class="SiteHeader-center">
            <div class="SiteHeader-center-link">
                <a href="/">- ImStocker -</a>
            </div>
        </div>
        <!-- <div class="SiteHeader-right SiteHeader-menu">
            -
             {<list($main.menuList)}}
             {<elem if(!@value.sidebar)}}
             <a
                 href="{@value.to}}"
                 class="SiteHeader-menu-one {'type-important' if(@value.important > 1)}} {'state-active' if(@value.important > 0 || $REQUEST_URI === @value.to)}}"
             >
                 {<elem if(@value.icon)}}
                 <span class="{@value.icon}}}"></span>
                 {/elem}}
                 <span class="SiteHeader-menu-one-caption">{@value.title}}</span>
             </a>
             {/elem}}
             {/list}}


             <div class="SiteHeader-menu-one state-active SiteHeader-menu-lang-switch">
                 <span class="SiteHeader-menu-one-caption">{$LANG}}</span>
                 <div class="SiteHeader-menu-lang-switch-options">
                     {<list($main.languageList)}}
                     {<elem if($LANG !== @value.name)}}
                     <a
                         rel="nofollow"
                         href="{@value.link}}"
                         class="SiteHeader-menu-lang-switch-options-one"
                     >
                         {@value.name}}
                     </a>
                     {/elem}}
                     {/list}}
                 </div>

             </div>
             <div class="SiteHeader-menu-sidebarButton" onclick="sidebarToggle()">
                 <div class="SiteHeader-menu-sidebarButton-bar"></div>
                 <div class="SiteHeader-menu-sidebarButton-bar"></div>
                 <div class="SiteHeader-menu-sidebarButton-bar"></div>
             </div>
         </div> -->
    </header>
    <div class="SiteMain">
        @yield('content')
    </div>
    <footer class="SiteFooter">
        <!--
        <div class="layout-center">

            <div class="footerLink-contacts">
                <div class="ims-cntc">

                    <a href="{$IMSTOCKER_SITE_HOST}}" class="footerLink-head">ImStocker</a>
                    <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/page/feedback?product=ims-studio" class="footer-links">{$T.headerMenu.feedback}}</a>
                    <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/blog" class="footer-links">{$T.headerMenu.blog}}</a>
                    <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/page/terms" class="footer-links">{$T.headerMenu.terms}}</a>
                    <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/page/privacy" class="footer-links">{$T.headerMenu.privacy}}</a>

                </div>

                <div class="ims-cntc-studio">
                    <a href="/{$LANG !== 'en' ? '/' + $LANG : ''}}" class="footerLink-head">ImStocker Studio</a>
                    <a href="/{$LANG}}/prices" class="footer-links">{$T.headerMenu.prices}}</a>
                    <a href="/{$LANG}}/tutorial" class="footer-links">{$T.headerMenu.tutorial}}</a>
                    <a href="{$IMSTOCKER_SITE_HOST}}{$LANG}}/account/cabinet" class="footer-links">{$T.headerMenu.cabinet}}</a>

                </div>
            </div>

            <div class="SiteFooter-social">
                <div class="SiteFooter-copyright">
                    &copy; IMSTOCKER.COM. {$T.common.footerRights}}. 2017-2022
                </div>
                <div class="SiteFooter-social-facebook">
                    <a href="https://www.facebook.com/groups/imstocker" target="_blank" rel="nofollow">
                        Facebook
                    </a>
                </div>
                @if(\Illuminate\Support\Facades\App::isLocal('ru'))
                <div class="SiteFooter-social-vk" >
                    <a href="https://vk.com/imstockercom" target="_blank" rel="nofollow">
                        ВКонтакте
                    </a>
                </div>
                <div class="SiteFooter-social-instagram" >
                    <a href="https://www.instagram.com/imstocker.ru/" target="_blank" rel="nofollow">
                        Instagram
                    </a>
                </div>
                @elseif(\Illuminate\Support\Facades\App::isLocal('en'))
                <div class="SiteFooter-social-instagram" >
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

        </div> -->
    </footer>

    <div class="SiteSidebar" onclick="sidebarClose()">
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
                    <!--
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
                    -->
                </div>
            </div>
            {list($main.menuList)}}
            <!-- <a
                href="{@value.to}}"
                class="SiteSidebar-menu-one {'type-important' if(@value.important > 1)}} {'state-active' if(@value.active)}}"
            >
                {<elem if(@value.icon)}}
                <span class="{@value.icon}}}"></span>
                {/elem}}
                <span class="SiteHeader-menu-one-caption">{@value.title}}</span>
            </a>
            -->
            {/list}}
        </div>
    </div>
    <script type="text/javascript" src="/js/main.js?210624_1"></script>
    <script>
        siteInit();
    </script>
</div>
</body>
</html>

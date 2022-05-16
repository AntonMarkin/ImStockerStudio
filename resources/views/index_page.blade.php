@extends('layouts.main_layout')

@section('content')
<div class="index-appBlock">
    <div class="layout-center">
        <div class="index-appBlock-top">
            <div class="index-appBlock-logo">
            <span class="index-appBlock-logo-imstocker">
                <img src="{{'storage/images/logo_vector_text.svg'}}" alt="ImStocker">
                <span class="index-appBlock-logo-imstocker-text">
                    <span class="index-appBlock-logo-imstocker-text-ims">IMS</span>tocker
                </span>
            </span>
                <span class="index-appBlock-logo-studio">Studio</span>
            </div>
            <div class="index-appBlock-title">
                <div class="index-appBlock-title-main">{{__('pageIndex.mainTitle')}}</div>
                <div class="index-appBlock-title-sub">{{__('pageIndex.mainTitleSub')}}</div>
            </div>
        </div>
        <div class="index-appBlock-bottom">
            <div class="index-appBlock-download-area">
                <div class="index-appBlock-download type-win">
                    <div class="index-appBlock-download-selector">
                        <div class="index-appBlock-download-selector-not-active">
                            Mac OS
                        </div>
                        <div class="index-appBlock-download-selector-active">
                            Windows
                        </div>
                    </div>
                    <a href="{{route('download',['os' => 'win'])}}" target="_blank" onclick="reachGoal('download_win')" rel="nofollow" class="index-appBlock-download-cur">
                        <div class="index-appBlock-download-cur-title">
                            <div class="index-appBlock-download-cur-title-selection">
                                Windows
                            </div>
                            <div class="index-appBlock-download-cur-title-subcaption">
                                {{__('pageIndex.download')}}
                            </div>
                        </div>
                        <div class="index-appBlock-download-info">
                            <div class="index-appBlock-download-info-icon"></div>
                            <div class="index-appBlock-download-info-content">
                                <div class="index-appBlock-download-info-name">
                                    {{$latestInfo['win']['file']}}
                                </div>
                                <div class="index-appBlock-download-info-size">
                                    {{$latestInfo['win']['sizeMB']}} MB
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="index-appBlock-download type-mac">
                    <div class="index-appBlock-download-selector">
                        <div class="index-appBlock-download-selector-not-active">
                            Windows
                        </div>
                        <div class="index-appBlock-download-selector-active">
                            Mac OS
                        </div>
                    </div>
                    <a href="{{route('download',['os' => 'mac'])}}" target="_blank" onclick="reachGoal('download_mac')" rel="nofollow" class="index-appBlock-download-cur">
                        <div class="index-appBlock-download-cur-title">
                            <div class="index-appBlock-download-cur-title-selection">
                                Mac OS
                            </div>
                            <div class="index-appBlock-download-cur-title-subcaption">
                                {{__('pageIndex.download')}}
                            </div>
                        </div>
                        <div class="index-appBlock-download-info">
                            <div class="index-appBlock-download-info-icon"></div>
                            <div class="index-appBlock-download-info-content">
                                <div class="index-appBlock-download-info-name">
                                    {{$latestInfo['mac']['file']}}
                                </div>
                                <div class="index-appBlock-download-info-size">
                                    {{$latestInfo['mac']['sizeMB']}} MB
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="index-appBlock-screen-area">
                <div class="index-appBlock-screen">
                    <img src="{{'storage/images/app_screen_'.\Illuminate\Support\Facades\App::currentLocale().'.png?210626'}}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="index-featuresBlock">
    <div class="layout-center main-page-layout">
        <div class="page-header">
            <h2>{{__('pageIndex.makeItEasier')}}</h2>
        </div>
        @if(\Illuminate\Support\Facades\App::isLocal('ru'))
        <div class="index-featuresBlock-features-old">
            <div class="index-featuresBlock-features-old-one">
                Организуйте ваши файлы с помощью рабочих областей
            </div>
            <div class="index-featuresBlock-features-old-one">
                Подбирайте ключевые слова с помощью любимого сервиса подбора
            </div>
            <div class="index-featuresBlock-features-old-one">
                Сохраняйте метаданные в файлы
            </div>
            <div class="index-featuresBlock-features-old-one">
                С легкостью работайте с фото, видео и векторными файлами
            </div>
        </div>

        <div class="index-featuresBlock-after">
            Узнайте больше о возможностях <span class="ims-big">ImStocker Studio:</span>
        </div>
        <div class="index-featuresBlock-afterLink">
            <a target="_blank" href="{{route('tutorial', ['lang' => 'ru'])}}" class="spr-programm">Справка по программе</a>
            <span class="ver-"></span>
            <a target="_blank" href="https://imstocker.com/ru/blog/tag/IMS%20Studio" class="spr-programm">Узнайте, что нового в IMS Studio</a>
        </div>

        @elseif(\Illuminate\Support\Facades\App::isLocal('en'))
        <div class="index-featuresBlock-features-old">
            <div class="index-featuresBlock-features-old-one">
                Organize your files using workspaces
            </div>
            <div class="index-featuresBlock-features-old-one">
                Pick keywords using keywording tool
            </div>
            <div class="index-featuresBlock-features-old-one">
                Save metadata into files
            </div>
            <div class="index-featuresBlock-features-old-one">
                Work with photo, vector and video files easily
            </div>
        </div>

        <div class="index-featuresBlock-after">
            Learn more about <span class="ims-big">ImStocker Studio:</span>
        </div>
        <div class="index-featuresBlock-afterLink">
            <a target="_blank" href="{{route('tutorial', ['lang' => 'en'])}}" class="spr-programm">Guide</a>
            <span class="ver-"></span>
            <a target="_blank" href="https://imstocker.com/en/blog/tag/IMS%20Studio" class="spr-programm">What's new in ImStocker Studio?</a>
        </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.main_layout')

@section('content')

    <div class="layout-center tutorialPage">
        <div class="main-section">
            <div class="nav">
                <a href="/" class="nav-link">{{__('breadcrumbs.mainPage')}}</a> &gt;
            </div>
            <div class="main-content">
                <div class="nav-bar-left-section">
                    <div class="tutorialPage-menu">
                        {{$tutorialMenu}}
                    </div>
                </div>
                <div class="main-box">
                    {{$tutorialContent}}
                </div>
            </div>
        </div>
    </div>

@endsection

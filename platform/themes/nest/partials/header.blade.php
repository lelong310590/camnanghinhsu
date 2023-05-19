<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('font_text', 'Lato')) }}:ital,wght@0,400;0,700;1,400;1,700&family={{ urlencode(theme_option('font_heading', 'Quicksand')) }}:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-text: {{ theme_option('font_text', 'Lato') }}, sans-serif;
            --font-heading: {{ theme_option('font_heading', 'Quicksand') }}, sans-serif;
            --color-brand: {{ theme_option('color_brand', '#3BB77E') }};
            --color-brand-rgb: {{ implode(',', BaseHelper::hexToRgb(theme_option('color_brand', '#3BB77E'))) }};
            --color-brand-dark: {{ theme_option('color_brand_dark', '#29A56C') }};
            --color-brand-2: {{ theme_option('color_brand_2', '#FDC040') }};
            --color-primary: {{ theme_option('color_primary', '#5a97fa') }};
            --color-secondary: {{ theme_option('color_secondary', '#3e5379') }};
            --color-warning: {{ theme_option('color_warning', '#ff9900') }};
            --color-danger: {{ theme_option('color_danger', '#FD6E6E') }};
            --color-success: {{ theme_option('color_success', '#81B13D') }};
            --color-info: {{ theme_option('color_info', '#2cc1d8') }};
            --color-text: {{ theme_option('color_text', '#7E7E7E') }};
            --color-heading: {{ theme_option('color_heading', '#253D4E') }};
            --color-grey-1: {{ theme_option('color_grey_1', '#253D4E') }};
            --color-grey-2: {{ theme_option('color_grey_2', '#242424') }};
            --color-grey-4: {{ theme_option('color_grey_4', '#adadad') }};
            --color-grey-9: {{ theme_option('color_grey_9', '#f4f5f9') }};
            --color-muted: {{ theme_option('color_muted', '#B6B6B6') }};
            --color-body: {{ theme_option('color_body', '#7E7E7E') }};
        }
    </style>

    @php
        Theme::asset()->remove('language-css');
        Theme::asset()->container('footer')->remove('language-public-js');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-css');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-js');
        Theme::asset()->container('footer')->remove('simple-slider-css');
        Theme::asset()->container('footer')->remove('simple-slider-js');
    @endphp

    {!! Theme::header() !!}

    @php
        $headerStyle = theme_option('header_style') ?: '';
        $page = Theme::get('page');
        if ($page) {
            $headerStyle = $page->getMetaData('header_style', true) ?: $headerStyle;
        }
        $headerStyle = ($headerStyle && in_array($headerStyle, array_keys(get_layout_header_styles()))) ? $headerStyle : '';
    @endphp
</head>

<body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif @if (Theme::get('bodyClass')) class="{{ Theme::get('bodyClass') }}" @endif>
    {!! apply_filters(THEME_FRONT_BODY, null) !!}
    <div id="alert-container"></div>

    <div class="menuBT d-flex">
        <div class="d-flex align-items-center">
            <a class="fSizeDown" onclick="fSizeDown()"><i class="fas fa-font" style="font-size: 16px!important;"></i>-</a>
            <a class="fSize" fvalue="16">14</a>
            <a class="fSizeUp" onclick="fSizeUp()"><i class="fas fa-font"></i>+</a>
        </div>

        <div class="d-flex align-items-center">
            <a class="findText" onclick="findText()"><i class="fas fa-search" style="font-size: 24px;"></i></a>
            <a class="backTop" onclick="backTop()"><i class="fas fa-arrow-circle-up" style="font-size: 24px;"></i></a>
        </div>
    </div>

    {!! Theme::partial('preloader') !!}



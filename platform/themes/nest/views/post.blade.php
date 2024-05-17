<div class="menuBTSearch" style="display: none;">
    <a class="searchUp"><i class="fas fa-chevron-up"></i></a>
    <a class="searchDown"><i class="fas fa-chevron-down"></i></a>
    <span class="formSearch"><i class="fa fa-search"></i> <input id="txtKey" type="text"> <i class="fa fa-times-circle clearformSearch"></i> <span class="numfuond"></span></span>
    <a class="searchClose"><i class="fas fa-times"></i></a>
</div>

@php
    $layout = MetaBox::getMetaData($post, 'layout', true);
    $layout = ($layout && in_array($layout, array_keys(get_blog_single_layouts()))) ? $layout : 'blog-post-right-sidebar';
    Theme::layout($layout);
    Theme::asset()->container('footer')->usePath(true)->add('magic-popup', 'js/plugins/magnific-popup.js');
    Theme::asset()->usePath(true)->add('magic-popup', 'css/plugins/fontawesome-all.css');
@endphp

@if (Str::endsWith($layout, ['full-width', 'right-sidebar', 'left-sidebar']))
    <div class="single-page pt-50 pr-30 MainContent" id="MainContent">
        <div class="single-content">
            <div class="row">
                <div class="col-lg-12 m-auto">
{{--                    {!! BaseHelper::clean($post->content) !!}--}}
                   <p class="text-center">Vui lòng truy cập văn bản tại phiên bản web : www.camnanghinhsu.com</p>
                    <br>
                    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ? Theme::partial('comments') : null) !!}
                </div>
            </div>
        </div>
    </div>
@endif

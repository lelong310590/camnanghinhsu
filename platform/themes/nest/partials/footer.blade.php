{{--    <footer class="main">--}}
{{--        {!! dynamic_sidebar('pre_footer_sidebar') !!}--}}

{{--        <section class="section-padding footer-mid">--}}
{{--            <div class="container pt-15 pb-20">--}}
{{--                <div class="row">--}}
{{--                    {!! dynamic_sidebar('footer_sidebar') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <div class="container pb-30  wow animate__animated animate__fadeInUp"  data-wow-delay="0">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-12 mb-30">--}}
{{--                    <div class="footer-bottom"></div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-6 col-md-6">--}}
{{--                    <p class="font-sm mb-0">{!! BaseHelper::clean(theme_option('copyright')) !!}</p>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">--}}
{{--                    @if (theme_option('hotline'))--}}
{{--                        <div class="hotline d-lg-inline-flex">--}}
{{--                            <img src="{{ Theme::asset()->url('imgs/theme/icons/phone-call.svg') }}" alt="hotline" />--}}
{{--                            <p>{{ theme_option('hotline') }}<span>{{ __('24/7 Support Center') }}</span></p>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">--}}
{{--                    @if (theme_option('social_links'))--}}
{{--                        <div class="mobile-social-icon">--}}
{{--                            <h6>{{ __('Follow Us') }}</h6>--}}
{{--                            @foreach(json_decode(theme_option('social_links'), true) as $socialLink)--}}
{{--                                @if (count($socialLink) == 3)--}}
{{--                                    <a href="{{ $socialLink[2]['value'] }}"--}}
{{--                                       title="{{ $socialLink[0]['value'] }}">--}}
{{--                                        <img src="{{ RvMedia::getImageUrl($socialLink[1]['value']) }}" alt="{{ $socialLink[0]['value'] }}" />--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <p class="font-sm">{{ __('Up to 15% discount on your first subscribe') }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}

{{--    <!-- Quick view -->--}}
{{--    <div class="modal fade custom-modal" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal-label" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered">--}}
{{--            <div class="modal-content">--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="half-circle-spinner loading-spinner">--}}
{{--                        <div class="circle circle-1"></div>--}}
{{--                        <div class="circle circle-2"></div>--}}
{{--                    </div>--}}
{{--                    <div class="quick-view-content"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <script>
        window.trans = {
            "Views": "{{ __('Views') }}",
            "Read more": "{{ __('Read more') }}",
            "days": "{{ __('days') }}",
            "hours": "{{ __('hours') }}",
            "mins": "{{ __('mins') }}",
            "sec": "{{ __('sec') }}",
            "No reviews!": "{{ __('No reviews!') }}",
            "Sold By": "{{ __('Sold By') }}",
            "Quick View": "{{ __('Quick View') }}",
            "Add To Wishlist": "{{ __('Add To Wishlist') }}",
            "Add To Compare": "{{ __('Add To Compare') }}",
            "Out Of Stock": "{{ __('Out Of Stock') }}",
            "Add To Cart": "{{ __('Add To Cart') }}",
            "Add": "{{ __('Add') }}",
        };

        window.siteUrl = "{{ route('public.index') }}";

        @if (is_plugin_active('ecommerce'))
            window.currencies = {!! json_encode(get_currencies_json()) !!};
        @endif
    </script>

    {!! Theme::footer() !!}

    @if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
        <script type="text/javascript">
            $(document).ready(function () {
                @if (session()->has('success_msg'))
                    window.showAlert('alert-success', '{{ session('success_msg') }}');
                @endif

                @if (session()->has('error_msg'))
                    window.showAlert('alert-danger', '{{ session('error_msg') }}');
                @endif

                @if (isset($error_msg))
                    window.showAlert('alert-danger', '{{ $error_msg }}');
                @endif

                @if (isset($errors))
                    @foreach ($errors->all() as $error)
                        window.showAlert('alert-danger', '{!! BaseHelper::clean($error) !!}');
                    @endforeach
                @endif
            });
        </script>
    @endif

    <script type="text/javascript">
        function fSizeUp() {
            var cf = parseInt($(".fSize").attr("fValue")) + 2;
            $(".MainContent *").css({
                fontSize : cf+"px",
                lineHeight: 1.5
            });
            $(".fSize").attr("fValue", cf);
            $(".fSize").html(cf - 2);
            setCookie("fSize", cf, 7);
        }
        function fSizeDown() {
            var cf = parseInt($(".fSize").attr("fValue")) - 2;
            $(".MainContent *").css("font-size", "" + cf + "px");
            $(".fSize").attr("fValue", cf);
            $(".fSize").html(cf - 2);
            setCookie("fSize", cf, 7);
        }

        function RemoveHighlight(highlightClass) {
            $('.' + highlightClass).each(function (i, v) {
                var $parent = $(this).parent();
                $(this).contents().unwrap();
                $parent.get(0).normalize();
            });
        }

        var VietNamChar = ["[a|á|à|ạ|ả|ã|â|ấ|ầ|ậ|ẩ|ẫ|ă|ắ|ằ|ặ|ẳ|ẵ]", "[e|é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ]", "[o|ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ]", "[u|ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ]", "[i|í|ì|ị|ỉ|ĩ]", "[d|đ]", "[y|ý|ỳ|ỵ|ỷ|ỹ]"];
        //var VietNamChar = ["[a|á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ă|ắ|ằ|ẳ|ẵ|ặ]", "[â|ấ|ầ|ẩ|ẫ|ậ]", "[ă|ắ|ằ|ẳ|ẵ|ặ]", "[á|ấ|ắ]", "[à|ầ|ằ]", "[ả|ẩ|ẵ]", "[ã|ẫ|ẵ]", "[ạ|ậ|ặ]", "ấ", "ầ", "ẩ", "ẫ", "ậ", "ắ", "ằ", "ẳ", "ẵ", "ặ", "[e|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ]", "[ê|ế|ề|ể|ễ|ệ]", "[é|ế]", "[è|ề]", "[ẻ|ể]", "[ẽ|ễ]", "[ẹ|ệ]", "ế", "ề", "ể", "ễ", "ệ", "[o|ó|ò|ỏ|ọ|õ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ]", "[ô|ố|ồ|ổ|ỗ|ộ]", "[ơ|ớ|ờ|ở|ỡ|ợ]", "[ó|ố|ớ]", "[ò|ồ|ờ]", "[ỏ|ổ|ở]", "[õ|ỗ|ỡ]", "[ọ|ộ|ợ]", "ố", "ồ", "ổ", "ỗ", "ộ", "ớ", "ờ", "ở", "ỡ", "ợ", "[u|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự]", "[ư|ứ|ừ|ử|ữ|ự]", "[ú|ứ]", "[ù|ù]", "[ủ|ủ]", "[ũ|ũ]", "[ụ|ụ]", "ứ", "ừ", "ử", "ữ", "ự", "[i|í|ì|ỉ|ĩ|ị]", "í", "ì", "ỉ", "ĩ", "ị", "[y|ý|ỳ|ỵ|ỷ|ỹ]", "ý", "ỳ", "ỷ", "ỹ", "ỵ", "[d|đ]"];
        function searchAndHighlight(searchTerm, selector, highlightClass, removePreviousHighlights) {
            if (searchTerm) {
                var _rs = "";
                var _temp = searchTerm.toLowerCase();
                var mt = "";
                for (var i = 0; i < _temp.length; i++) {
                    mt = _temp.charAt(i);
                    for (var j = VietNamChar.length - 1; j >= 0; j--) {
                        if (VietNamChar[j].indexOf(_temp.charAt(i)) >= 0) {
                            mt = VietNamChar[j];
                            j = -1;
                        }
                    }
                    _rs = _rs + mt;
                }

                var selector = selector || "body",
                    searchTermRegEx = new RegExp("(" + _rs + ")", "gi"),
                    matches = 0,
                    helper = {};
                helper.doHighlight = function (node, searchTerm) {
                    if (node.nodeType === 3) {
                        if (node.nodeValue.match(searchTermRegEx)) {
                            matches++;
                            var tempNode = document.createElement('span');
                            tempNode.innerHTML = node.nodeValue.replace(searchTermRegEx, "<span class='" + highlightClass + "'>$1</span>");
                            node.parentNode.replaceChild(tempNode, node);
                        }
                    }
                    else if (node.nodeType === 1 && node.childNodes && !/(style|script)/i.test(node.tagName)) {
                        $.each(node.childNodes, function (i, v) {
                            helper.doHighlight(node.childNodes[i], searchTerm);
                        });
                    }
                };
                if (removePreviousHighlights) {
                    $('.' + highlightClass).each(function (i, v) {
                        var $parent = $(this).parent();
                        $(this).contents().unwrap();
                        $parent.get(0).normalize();
                    });
                }

                $.each($(selector).children(), function (index, val) {

                    helper.doHighlight(this, searchTerm);
                });
                return matches;
            }
            return 0;
        }

        let isShow = false;
        let isShowFont = false;
        let fSize = 0;
        let isIphone = '0';

        let _keyCode = 0;
        let count = 0;
        let _index = 0;
        let _length = 0;

        $("#txtKey").keyup(function myfunction(event) {
            if (event.keyCode === 231) {
                _keyCode = event.keyCode;
            }
            else if (event.keyCode === 8 && (_keyCode === 231 || _keyCode === 239)) {
                _keyCode = _keyCode + event.keyCode;
            }
            else {
                _keyCode = 0;
                if (event.keyCode === 13) {
                    $("#txtKey").blur();
                    document.activeElement.blur();
                    if ($('#txtKey').val() === "") {
                        if (count > 0) {
                            count = 0;
                            RemoveHighlight('highlighted');
                            $(".formSearch .numfuond").html('');
                        }
                    }
                }
                else if (event.keyCode === 32) {

                }
                else if (_length !== $('#txtKey').val().length) {
                    _length = $('#txtKey').val().length;

                    if ($('#txtKey').val() === "") {
                        if (count > 0) {
                            count = 0;
                            RemoveHighlight('highlighted');
                            $(".formSearch .numfuond").html('');
                        }
                    }
                    else {

                        _index = 0;
                        count = searchAndHighlight($('#txtKey').val(), '.MainContent', 'highlighted', true);
                        count = $(".MainContent .highlighted").length;
                        if (count > 0)
                            $(".formSearch .numfuond").html("1/" + count);
                        else
                            $(".formSearch .numfuond").html(count);

                        $(".MainContent .highlighted").each(function (index) {
                            if (_index === index) {
                                var topHL = $(this);
                                $(this).addClass("active");
                                var targetOffset = topHL.offset().top - 100;
                                $('html,body').animate({ scrollTop: targetOffset }, 500);
                                return false;
                            }
                        });
                    }

                }
            }

        });

        $(".searchUp").click(function myfunction() {
            $("#txtKey").focus();
            if (count > 0) {

                _index = _index - 1;

                if (_index < 0) {
                    _index = count - 1;
                }



                $(".MainContent .highlighted").each(function (index) {
                    var topHL = $(this);
                    if (_index == index) {

                        $(this).addClass("active");
                        var targetOffset = topHL.offset().top - 100;
                        $('html,body').animate({ scrollTop: targetOffset }, 500);
                        $(".formSearch .numfuond").html(_index + 1 + "/" + count);
                    }
                    else {
                        $(this).removeClass("active");
                    }
                });
            }

        });

        $(".searchDown").click(function myfunction() {
            $("#txtKey").focus();
            if (count > 0) {
                _index = _index + 1;
                if (_index == count) {
                    _index = 0;
                }
                $(".MainContent .highlighted").each(function (index) {
                    var topHL = $(this);
                    if (_index == index) {

                        $(this).addClass("active");
                        var targetOffset = topHL.offset().top - 100;
                        $('html,body').animate({ scrollTop: targetOffset }, 500);
                        $(".formSearch .numfuond").html(_index + 1 + "/" + count);
                    }
                    else {
                        $(this).removeClass("active");
                    }
                });
            }
        });

        $(".clearformSearch").click(function myfunction() {
            $("#txtKey").val("");
            $(".formSearch .numfuond").html("");
            if (count > 0) {
                count = 0;
                RemoveHighlight('highlighted');
                $(".formSearch .numfuond").html('');
            }
            $("#txtKey").focus();
            _keyCode = 0
            _length = 0;
        });

        $(".searchClose").click(function myfunction() {
            $(".menuBTSearch").hide();
            $(".menuBT").show();
            $(".formSearch .numfuond").html("");
            if (count > 0) {
                count = 0;
                RemoveHighlight('highlighted');
                $(".formSearch .numfuond").html('');
            }
            $("#txtKey").blur();
            _keyCode = 0
            _length = 0;

            //hideTheKeyBoard();
        });

        function backTop() {
            $('body,html').animate({ scrollTop: 0 }, 500);
        }

        $('#txtKey').focus(function () {
            window.visualViewport.addEventListener("resize", resizeHandler);
        })

        function resizeHandler() {
            let height = window.visualViewport.height;
            const viewport = window.visualViewport;
            if (!/iPhone|iPad|iPod/.test(window.navigator.userAgent)) {
                height = viewport.height;
            }
            $('#txtKey').style.bottom = `${height - viewport.height}px`;
        }

        function findText() {
            $(".menuBTSearch").css("width", $(document).width() + "px!important");
            $(".menuBTSearch").show();
            $(".menuBT").hide();

            //$(".formSearch").width($(document).width() - 125);
            //$("#txtKey").width($(".formSearch").width() - 100);
            $(".formSearch").css("width", "auto !important");
            $("#txtKey").css("width", "auto !important");

            $("#txtKey").val("");

            $("#txtKey").focus();
        }
    </script>

    </body>
</html>

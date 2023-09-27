<?php
$menu_footer = getMenus('menu-footer');
$policy = Cache::remember('policy', 10000, function () {
    $policy = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'policy'])->with('slides')->first();
    return $policy;
});
?>
@if(!empty($policy->slides) && count($policy->slides) > 0)
<section class="icon-box border border-gray-200 py-[20px] md:py-[40px] mt-0 md:mt-[30px] wow fadeInUp">
    <div class="container mx-auto px-3">
        <div class="grid grid-cols-1 md:grid-cols-3 space-y-[30px] md:space-y-0 md:gap-[30px]">
            @foreach($policy->slides as $slide)
            <div class="col-span-1">
                <div class="item flex flex-wrap mb-[15px] md:mb-0">
                    <div class="w-[35px]">
                        <img src="{{$slide->src}}" alt="{{$slide->title}}">
                    </div>
                    <div class="nav-icon pl-[10px] space-y-2 flex-1">
                        <h3 class="title-2 text-f16 font-bold">{{$slide->title}}</h3>
                        <p>{{$slide->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- start: Footer -->
<footer class="relative wow fadeInUp pt-[30px] md:pt-[70px] bg-[#f7f7f7]">
    <div class="container mx-auto pl-4 pr-4 relative">
        <div class="flex flex-wrap justify-between mx-[-10px]">
            <div class="w-full md:w-1/3 px-[10px]">
                <div class="item pb-[15px] md:pb-0">
                    <h3 class="footer_title pb-5 text-f18 text-black uppercase leading-[26px] font-bold">
                        {{$fcSystem['homepage_brandname']}}
                    </h3>

                    <ul class="md:block">
                        <li class="mb-[8px]">
                            <a href="javascript:void(0)" class="flex items-center text-f15 space-x-[5px] text-black hover:opacity-80 transition-all">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>
                                    Địa chỉ:
                                    {{$fcSystem['contact_address']}}
                                </span>
                            </a>
                        </li>

                        <li class="mb-[8px]">
                            <a href="javascript:void(0)" class="flex items-center text-f15 space-x-[5px] text-black hover:opacity-80 transition-all">
                                <i class="fa-solid fa-clock"></i>
                                <span>
                                    Giờ làm việc:
                                    {{$fcSystem['contact_time']}}
                                </span>

                            </a>
                        </li>

                        <li class="mb-[8px]">
                            <a href="tel:{{$fcSystem['contact_hotline']}}" class="flex items-center text-f15 space-x-[5px] text-black hover:opacity-80 transition-all">
                                <i class="fa-solid fa-phone"></i>
                                <span>
                                    Điện thoại:
                                    {{$fcSystem['contact_hotline']}}
                                </span>
                            </a>
                        </li>

                        <li class="mb-[8px]">
                            <a href="mailto:{{$fcSystem['contact_email']}}" class="flex items-center text-f15 space-x-[5px] text-black hover:opacity-80 transition-all">
                                <i class="fa-solid fa-envelope"></i>
                                <span>
                                    E-mail: {{$fcSystem['contact_email']}}
                                </span>
                            </a>
                        </li>

                        <li class="mb-[8px]">
                            <a href="{{$fcSystem['contact_website']}}" class="flex items-center text-f15 space-x-[5px] text-black hover:opacity-80 transition-all">
                                <i class="fa-solid fa-globe"></i>
                                <span>
                                    Website: {{$fcSystem['contact_website']}}
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="social-pc mt-[20px]">
                        <ul class="flex flex-wrap items-center">
                            @if(!empty($fcSystem['social_facebook']))
                            <li>
                                <a target="_blank" href="{{$fcSystem['social_facebook']}}" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            @endif
                            @if(!empty($fcSystem['social_twitter']))
                            <li>
                                <a target="_blank" href="{{$fcSystem['social_twitter']}}" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            @endif
                            @if(!empty($fcSystem['social_google_plus']))
                            <li>
                                <a target="_blank" href="{{$fcSystem['social_youtube']}}" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-google"></i>
                                </a>
                            </li>
                            @endif
                            @if(!empty($fcSystem['social_youtube']))
                            <li>
                                <a target="_blank" href="{{$fcSystem['social_google_plus']}}" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            @endif
                            @if(!empty($fcSystem['social_tiktok']))
                            <li>
                                <a href="" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-tiktok"></i></a>
                            </li>
                            @endif
                            @if(!empty($fcSystem['social_instagram']))

                            <li>
                                <a href="" class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @if($menu_footer && count($menu_footer->menu_items) > 0)
            @foreach($menu_footer->menu_items as $key=>$item)
            @if (count($item->children) > 0)
            <div class="w-full md:w-1/3 px-10px mb-[15px] lg:mb-0">
                <div class="item">
                    <h3 class="footer_title pb-5 text-f16 text-black uppercase font-bold">
                        {{$item->title}}
                    </h3>
                    <ul class="md:block">
                        @foreach($item->children as $child)
                        <li class="mb-[8px]">
                            <a href="{{url($child->slug)}}" class="text-f15 text-black inline-block hover:opacity-80 transition-all">
                                <i class="fa-solid fa-angles-right mr-[5px] text-f11"></i>
                                {{$child->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            <div class="w-full md:w-1/3 px-10px mb-[15px] lg:mb-0">
                <div class="item">
                    <h3 class="footer_title pb-5 text-f16 text-black uppercase font-bold">
                        Facebook
                    </h3>
                    <div>
                    <div class="fb-page" data-href="{{$fcSystem['social_facebook']}}" data-tabs="timeline"
                        data-width="400" data-height="200" data-small-header="true" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="{{$fcSystem['social_facebook']}}" class="fb-xfbml-parse-ignore"><a
                                href="{{$fcSystem['social_facebook']}}">Doinb Store</a></blockquote>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto pl-2 pr-2 mt-0 md:mt-[30px]">
        <div class="copy-right border-t border-gray-300 py-[10px]">
            <p class="text-f13 text-black text-center">
                {{$fcSystem['contact_mst']}}
            </p>
            <p class="text-f13 text-black text-center">
                {{$fcSystem['homepage_copyright']}}
            </p>
        </div>
    </div>
</footer>

<div class="support-online">
    <div class="support-content" style="display: none">
        <a href="tel:{{$fcSystem['contact_hotline']}}" class="call-now" rel="nofollow">
            <i class="fa-solid fa-mobile-retro"></i>
            <div class="animated infinite zoomIn kenit-alo-circle"></div>
            <div class="animated infinite pulse kenit-alo-circle-fill"></div>
            <span>Gọi ngay: {{$fcSystem['contact_hotline']}}</span>
        </a>
        <a class="mes" href="{{$fcSystem['social_facebookm']}}" target="_blank">
            <i class="fa-brands fa-facebook-f"></i>
            <span>Nhắn tin facebook</span>
        </a>
        <a class="zalo" href="https://zalo.me/{{$fcSystem['social_zalo']}}">
            <i class="fa-brands fa-rocketchat"></i>
            <span>Zalo: {{$fcSystem['social_zalo']}}</span>
        </a>
        <a class="sms" href="sms:{{$fcSystem['contact_hotline']}}">
            <i class="fa-solid fa-comment-sms"></i>
            <span>SMS: {{$fcSystem['contact_hotline']}}</span>
        </a>
    </div>
    <a class="btn-support">
        <i class="fa-solid fa-user"></i>
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    </a>
</div>
<!--  end: Footer -->

<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
@if(svl_ismobile() != 'is desktop')

<script src="{{asset('frontend/js/hc-offcanvas-nav.js')}}"></script>

<script>
    /*js icon menu bar*/

    function myFunction(x) {

        x.classList.toggle("change")

    }(function($) {

        var $main_nav = $('#main-nav');

        var $toggle = $('.toggle');

        var defaultData = {

            maxWidth: !1,

            customToggle: $toggle,

            levelTitles: !0,

            pushContent: '#container'

        };

        $main_nav.find('li.add').children('a').on('click', function() {

            var $this = $(this);

            var $li = $this.parent();

            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a>' + items[0] + '</a></li>');

            items.shift();

            if (!items.length) {

                $li.remove()

            } else {

                $this.attr('data-add', JSON.stringify(items))

            }

            Nav.update(!0)

        });

        var Nav = $main_nav.hcOffcanvasNav(defaultData);

        const update = (settings) => {

            if (Nav.isOpen()) {

                Nav.on('close.once', function() {

                    Nav.update(settings);

                    Nav.open()

                });

                Nav.close()

            } else {

                Nav.update(settings)

            }

        };

        $('.actions').find('a').on('click', function(e) {

            e.preventDefault();

            var $this = $(this).addClass('active');

            var $siblings = $this.parent().siblings().children('a').removeClass('active');

            var settings = eval('(' + $this.data('demo') + ')');

            update(settings)

        });

        $('.actions').find('input').on('change', function() {

            var $this = $(this);

            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {

                update(settings)

            } else {

                var removeData = {};

                $.each(settings, function(index, value) {

                    removeData[index] = !1

                });

                update(removeData)

            }

        })

    })(jQuery)

    //end mobile
</script>

@endif

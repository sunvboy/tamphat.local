@extends('homepage.layout.home')
@section('content')
<div id="main" class="sitemap">
    @if(!empty($slideHome->slides) && count($slideHome->slides) > 0)
    <div class="main-banner">
        <div id="slider-home" class="owl-carousel">
            @foreach($slideHome->slides as $slide)
            <div class="item">
                <a href="{{url($slide->link)}}">
                    <img class="w-full" src="{{asset($slide->src)}}" alt="banner">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @if(!empty($cpOne->slides) && count($cpOne->slides) > 0)
    <section class="top-content md:pt-10 wow fadeInUp">
        <div class="flex flex-wrap justify-start">
            @foreach($cpOne->slides as $slide)
            <div class="w-1/2 md:w-1/4 px-[1px]">
                <div class="item hover-zoom relative mb-[2px] md:mb-0">
                    <div class="img">
                        <a href="{{url($slide->link)}}"><img src="{{asset($slide->src)}}" alt="{{$slide->title}}" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                    </div>
                    <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                    @if(!empty($slide->title))
                    <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                        <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                            <a href="{{url($slide->link)}}" class="text-white"> {{$slide->title}} </a>
                        </h3>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @if(!empty($partner->slides) && count($partner->slides) > 0)
    <!-- start: box 4 -->
    <section class="partner-home py-12 wow fadeInUp">
        <div class="container mx-auto px-3">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                {{$partner->title}}
            </h2>
        </div>
        <div class="slider-logo owl-carousel mt-[30px]">
            @foreach($partner->slides as $item)
            <div class="item">
                <a href="{{$item->link}}"><img src="{{asset($item->src)}}" alt="{{$item->title}}" class="h-[27px] object-contain" style="vertical-align:bottom" /></a>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @if(!empty($ishomeCategoryProduct))
    <section class="product-home pt-[20px] md:pt-16 wow fadeInUp">
        <div class="">
            <div class="relative mb-[20px] md:mb-[30px] px-4">
                <h2 class="title-primary text-center text-f22 uppercase font-bold static md:absolute top-1/2 -translate-y-1/2 left-3">
                    {{$fcSystem['title_1']}}
                </h2>
                <ul class="tabs flex flex-wrap justify-center mt-[15px] md:mt-0">
                    @foreach($ishomeCategoryProduct as $key=>$item)
                    <li class="tab {{!empty($key == 0) ? 'current' : ''}} cursor-pointer inline-block py-[8px] px-[15px] border mx-[2px] font-medium uppercase" data-tab="tab-{{$item->id}}">
                        • {{$item->title}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @foreach($ishomeCategoryProduct as $key=>$item)
            <div id="tab-{{$item->id}}" class="tab-content {{!empty($key == 0) ? 'current' : ''}}">
                <div class="slider-product owl-carousel">
                    @if(!empty($item->posts))
                    @foreach($item->posts as $k=>$v)
                    <?php echo htmlItemProduct($k, $v); ?>
                    @endforeach
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @if(!empty($cpTwo->slides) && count($cpTwo->slides) > 0)
    <section class="top-content top-content-2 py-[30px] md:py-[80px] wow fadeInUp" style="visibility: visible; animation-name: fadeInUp">
        <div class=" mx-auto">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                {{$cpTwo->title}}
            </h2>
            <div class="flex flex-wrap justify-start mt-[30px]">
                @foreach($cpTwo->slides as $slide)
                <div class="w-1/2 md:w-1/4 px-[1px]">
                    <div class="item hover-zoom relative mb-[2px] md:mb-0">
                        <div class="img">
                            <a href="{{url($slide->link)}}"><img src="{{asset($slide->src)}}" alt="{{$slide->title}}" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                        </div>
                        <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                        @if(!empty($slide->title))
                        <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                            <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                                <a href="{{url($slide->link)}}" class="text-white"> {{$slide->title}} </a>
                            </h3>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(!empty($cpThree->slides) && count($cpThree->slides) > 0)
    <section class="other-shops wow fadeInUp">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-100px]">
                @foreach($cpThree->slides as $slide)
                <div class="w-full md:w-1/2 px-[100px]">
                    <div class="item mb-[15px] md:mb-[50px] relative">
                        <div class="img relative">
                            <a href="{{url($slide->link)}}"><img src="{{asset($slide->src)}}" alt="{{$slide->title}}" class="w-full" /></a>

                        </div>
                        <div class="readmore text-center mt-[15px]">
                            <a href="{{url($slide->link)}}" class="underline text-f16 font-bold transition-all hover:pl-[10px] hover:opacity-75 tracking-wider">
                                {{$slide->title}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <?php
    $jsonHome = !empty($fields['config_colums_json_home']) ? $fields['config_colums_json_home'] : '';
    ?>
    @if(!empty($jsonHome->title))
    @foreach($jsonHome->title as $key=>$item)
    <section class="banner-shop banner-shop1 wow fadeInUp">
        <div class="img-banner-shop hover-zoom">
            <a href="{{!empty($jsonHome->link_button[$key]) ? $jsonHome->link_button[$key] :''}}">
                <img src="{{!empty($jsonHome->image[$key]) ? $jsonHome->image[$key] :''}}" alt="{{$item}}" class="w-full" />
            </a>
        </div>
        <div class="container mx-auto px-3 py-12">
            <div class="content-banner-shop text-center space-y-4">
                <h2 class="title-primary text-center text-f24 uppercase font-bold mb-0">
                    {{$item}}
                </h2>
                @if(!empty($jsonHome->description[$key]))
                <h4 class="text-f18 ">{{!empty($jsonHome->description[$key]) ? $jsonHome->description[$key] :''}}</h4>
                @endif
                <a href="{{!empty($jsonHome->link_button[$key]) ? $jsonHome->link_button[$key] :''}}" class="inline-flex uppercase px-[30px] py-[14px] bg-color_primary text-white border border-color_primary transition-all hover:bg-white hover:text-color_primary">
                    {{!empty($jsonHome->title_button[$key]) ? $jsonHome->title_button[$key] :''}}
                </a>
            </div>
        </div>
    </section>
    @endforeach
    @endif
    @if(!empty($cpFour->slides) && count($cpFour->slides) > 0)
    <section class="top-content top-content-2 pb-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp">
        <div class=" mx-auto">
            <h2 class="title-primary text-f22 text-center uppercase font-bold">
                {{$cpFour->title}}
            </h2>
            <div class="flex flex-wrap justify-start mt-[30px]">
                @foreach($cpFour->slides as $slide)
                <div class="w-1/2 md:w-1/4 px-[1px]">
                    <div class="item hover-zoom relative mb-[2px] md:mb-0">
                        <div class="img">
                            <a href="{{url($slide->link)}}"><img src="{{asset($slide->src)}}" alt="{{$slide->title}}" class="w-full object-cover md:h-[430px] 2xl:h-[630px]" /></a>
                        </div>
                        <div class="gateway-blocks__overlay h-full absolute top-0 w-full left-0" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%,#00000033 100%);"></div>
                        @if(!empty($slide->title))
                        <div class="nav-img absolute bottom-0 left-0 w-full p-[10px] md:p-[20px] z-10 text-center">
                            <h3 class="text-f16 md:text-f23 font-bold uppercase leading-[20px] md:leading-[26px]">
                                <a href="{{url($slide->link)}}" class="text-white"> {{$slide->title}} </a>
                            </h3>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <?php /*<section class="banner-shop banner-shop1 wow fadeInUp">
        <div class="img-banner-shop hover-zoom">
            <a href=""><img src="frontend/img/brbie_d.webp" alt="" class="w-full" /></a>
        </div>
        <div class="container mx-auto px-3 py-12">
            <div class="content-banner-shop text-center">
                <h2 class="title-primary text-center text-f24 uppercase font-bold">
                    BARBIE GIRL IN A DESIGNER WORLD
                </h2>
                <h4 class="text-f18 pt-[15px]">NEW: THE BARBIE COLLECTION</h4>
                <button class="mt-[20px] uppercase px-[30px] h-[45px] bg-color_primary text-white border border-color_primary transition-all hover:bg-white hover:text-color_primary">
                    THE PINK SHOP
                </button>
            </div>
        </div>
    </section>*/ ?>
    @include('homepage.common.recently')
</div>
@endsection
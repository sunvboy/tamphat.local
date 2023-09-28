<?php
if (!function_exists('svl_ismobile')) {

    function svl_ismobile()
    {
        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
        );

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'is tablet';
        } else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'is mobile';
        } else {
            // do something for everything else
            return 'is desktop';
        }
    }
}
if (!function_exists('getImageUrl')) {
    function getImageUrl($module = '', $src = '', $type = '')
    {
        $path  = '';
        $dir = explode("/", $src);
        $file = collect($dir)->last();
        if (svl_ismobile() == 'is mobile') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else if (svl_ismobile() == 'is tablet') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else if (svl_ismobile() == 'is desktop') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else {
            $path = $src;
        }
        if (File::exists(base_path($path))) {
            $path = $path;
        } else {
            $path = $src;
        }
        return asset($path);
    }
}
if (!function_exists('getFunctions')) {
    function getFunctions()
    {
        $data = [];
        $getFunctions = \App\Models\Permission::select('title')->where('publish', 0)->where('parent_id', 0)->get()->pluck('title');
        if (!$getFunctions->isEmpty()) {

            foreach ($getFunctions as $v) {
                $data[] = $v;
            }
        }
        return $data;
    }
}
if (!function_exists('getUrlHome')) {
    function getUrlHome()
    {
        return !empty(config('app.locale') == 'vi') ? url('/') : url('/en');
    }
}
/**HTML: Breadcrumb */
if (!function_exists('htmlBreadcrumb')) {
    function htmlBreadcrumb($title = '', $breadcrumb = [])
    {
        $html = '';
        $html .= '<div class="breadcrumb py-[10px] relative z-10 mt-[5px]">
        <div class="container mx-auto px-3">
          <ul class="flex flex-wrap justify-center">
            <li class="pr-[5px] text-black">
              <a href="' . getUrlHome() . '" class="text-f15 text-black">Trang chủ</a>
            </li>';
        if (!empty($breadcrumb)) {
            foreach ($breadcrumb as $item) {
                $html .= '<li>
                    <div class="flex items-center">/<a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">' . $item['title'] . '&nbsp</a>
                    </div>
                </li>';
            }
        } else {
            $html .= '<li>
                    <div class="flex items-center">/<a href="javascript:void(0)" class="text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">' . $title . '</a>
                    </div>
                </li>';
        }
        $html .= '</ul>
        </div>
      </div>';
        /*
        $html .= '
        <nav class="px-3 relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
            <ol class="container inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="' . getUrlHome() . '" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        ' . trans('index.home') . '
                    </a>
                </li>';
        if (!empty($breadcrumb)) {
            foreach ($breadcrumb as $item) {
                $html .= '<li>
                    <div class="flex items-center">
                       /
                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">' . $item['title'] . '</a>
                    </div>
                </li>';
            }
        } else {
            $html .= '<li>
                    <div class="flex items-center">
                        /
                        <a href="javascript:void(0)" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">' . $title . '</a>
                    </div>
                </li>';
        }


        $html .= '</ol>
        </nav>';
        */

        return $html;
    }
}
if (!function_exists('htmlArticle')) {
    function htmlArticle($item = [])
    {
        $html = '';
        $html .= '<div class="mb-[50px] px-[10px]">
             <div class=" h-full flex flex-col space-y-2">
                <div class="img hover-zoom flex-shrink-0 zoom-effect overflow-hidden">
                    <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="relative">
                        <img src="' . asset($item['image']) . '" alt="' . $item['title'] . '" class="w-full object-cover md:h-[190px]" />
                    </a>
                </div>
                 <div class="flex-1 flex flex-col justify-between space-y-1.5">
                    <h3 class="title-2 text-f15 md:text-base font-black  clamp-3">
                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="text-base leading-[1.1] transition-all hover:text-primary">' . $item['title'] . '</a>
                    </h3>
                    <div class="flex items-center text-sm text-[#999]">
                        <span class="flex items-center space-x-1">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>
                                ' . $item['created_at'] . '
                            </span>
                        </span>
                    </div>
                    <div class="clamp clamp-3 text-[#757575]">
                        ' . strip_tags($item['description']) . '
                    </div>
                    <div>
                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="font-bold tracking-wider uppercase text-f13">Xem thêm ...</a>
                    </div>
                 </div>
             </div>
         </div>';
        return $html;
    }
}
if (!function_exists('htmlAddress')) {
    function htmlAddress($data = [])
    {
        $html = '';
        if (isset($data)) {
            foreach ($data as $k => $v) {
                $html .= ' <li class="showroom-item loc_link result-item" data-brand="' . $v->title . '"
                    data-address="' . $v->address . '" data-phone="' . $v->hotline . '" data-lat="' . $v->lat . '"
                    data-long="' . $v->long . '">
                    <div class="heading" style="display: flex">

                        <p class="name-label" style="flex: 1">
                            <strong>' . ($k + 1) . '. ' . $v->title . '</strong>
                        </p>
                    </div>
                    <div class="details">
                        <p class="address" style="flex:1"><em>' . $v->address . '</em>
                        </p>

                        <p class="button-desktop button-view hidden-xs">
                            <a href="javascript:void(0)" onclick="return false;">Tìm đường</a>
                            <a class="arrow-right"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </p>
                        <p class="button-mobile button-view visible-xs">
                            <a target="_blank" href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '">Tìm đường</a>
                            <a class="arrow-right" target="_blank"
                                href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '"><span><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </p>
                    </div>
                </li>';
            }
        }
        return $html;
    }
}
/**HTML: item sản phẩm */
if (!function_exists('htmlItemProduct')) {
    function htmlItemProduct($key = '', $item = [], $class = 'item item-product')
    {
        $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'], TRUE) : NULL;
        $i_class = 'fa-regular';
        if (!empty($wishlist)) {
            if (in_array($item['id'], $wishlist)) {
                $i_class = 'fa-solid';
            }
        }
        $html = '';
        $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' =>
        $item['price_contact']));
        $route = route('routerURL', ['slug' => $item['slug']]);

        if (!empty($item['image_json'])) {
            $listAlbums = json_decode($item['image_json'], true);
            if (count($listAlbums) < 2) {
                $listAlbums = [$item['image'], $item['image']];
            }
        } else {
            $listAlbums = [$item['image'], $item['image']];
        }
        $getTags = $item['getTags'];
        $html .= '<div class="' . $class . '">
                        <div class="img relative">
                            <div class="img-default">
                                <a href="' . $route . '"><img src="' . asset($listAlbums[0]) . '" class="object-cover w-full" alt="' . $item['title'] . '" /></a>
                            </div>
                            <div class="img-hover absolute top-0 left-0 w-full h-full">
                                <a href="' . $route . '"><img src="' . asset($listAlbums[1]) . '" class="object-cover w-full" alt="' . $item['title'] . '" /></a>
                            </div>
                            <div class="hear-icon absolute right-[10px] top-[10px] text-f20">
                                <a href="javascript:void(0)" data-id="' . $item['id'] . '" class="js_add_wishlist "><i class="' . $i_class . ' fa-heart js_add_wishlist_' . $item['id'] . '"></i></a>
                            </div>
                        </div>
                        <div class="nav-img p-4">';
        if (!empty($getTags)) {
            foreach ($getTags as $kt => $tag) {
                if ($kt == 0) {
                    $html .= '<h3 class="title-2 text-f15 font-bold">
                                <a href="' . route('tagURL', ['slug' => $tag['slug']]) . '">' . $tag['title'] . '</a>
                            </h3>';
                }
            }
        }

        $html .= '<a href="' . $route . '" class=" text-f13 md:text-f14 desc mt-[5px] mb-[3px]">
                                ' . $item['title'] . '
                            </a>
                            <p class="price text-red-600 text-f15 font-bold mt-[5px]">
                                ' . $price['price_final'] . '';
        if (!empty($price['price_old'])) {
            $html .= '<del class="text-f14 text-gray-400 font-medium ml-[5px]">' . $price['price_old'] . '</del>';
        }
        $html .= '</p>
                        </div>
                    </div>';
        return $html;
    }
}
/**HTML: item sản phẩm bán kèm */
if (!function_exists('htmlItemProductUpSell')) {
    function htmlItemProductUpSell($item = [])
    {
        $html = '';
        $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' => $item['price_contact']));
        $href = route('routerURL', ['slug', $item['slug']]);
        $img = !empty($item['image']) ? $item['image'] : 'images/404.png';
        $title = $item['title'];
        $html .= '<div class="product-item text-center pd-2 mb-6" style="border-bottom: 1px solid #ddd">
                    <div class="box-image">
                        <a href="' . $href . '"><img src="' . $img . '" alt="' . $title . '" height="90" width="90" style="display: inline-block;object-fit: contain"></a>
                    </div>
                    <div class="box-text pt-2 pb-2">
                        <a href="' . $href . '">
                            <h4 class="title-product text-f15">
                                ' . $title . '
                            </h4>
                        </a>
                    </div>
                    <div class="box-price pb-2">
                        <span class="text-red extraPriceFinal text-f16 text-red-600 font-bold">' . $price['price_final'] . '</span>
                        <del class="ml-[5px] extraPriceOld text-f14">' . $price['price_old'] . '</del>
                    </div>
                    <div class="box-action pb-5">
                        <a href="javascript:void(0)" class="addToCartDeals text-f15 text-blue-700">+ Thêm vào giỏ</a>
                    </div>
                </div>';
        return $html;
    }
}

<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Components\Comment;
use App\Components\System;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Components\Nestedsetbie;
use App\Components\Helper;

class HomeController extends Controller
{
    protected $comment;
    protected $system;
    protected $Nestedsetbie;
    protected $Helper;

    public function __construct()
    {
        $this->comment = new Comment();
        $this->system = new System();
        $this->Helper = new Helper();
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
    }
    public function index()
    {
        /*    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://services.mybcapps.com/bc-sf-filter/filter?shop=childsplay-online.myshopify.com&return_all_currency_fields=false&build_filter_tree=true&collection_scope=419534307542&sort_first=available&limit=60&locale=en&currency=VND',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, TRUE);
        // echo "<pre>";
        // var_dump($response);
        // die;
        // $products = [];
        foreach ($response['products'] as $item) {
            $attrs = [];
            if (!empty($item['options_with_values'])) {
                foreach ($item['options_with_values'] as $k => $attr) {
                    if (!empty($attr['values'])) {
                        foreach ($attr['values'] as $v) {
                            $attrs[$attr['name']][] = $v['title'];
                        }
                    }
                }
            }
            $catalogue_id  = \App\Models\Tag::where('title', $item['vendor'])->first();
            if (empty($catalogue_id)) {
                $tag_id = \App\Models\Tag::insertGetId([
                    'title' => $item['vendor'],
                    'slug' => slug($item['vendor']),
                    'publish' => 0,
                    'userid_created' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'alanguage' => config('app.locale'),
                ]);
            } else {
                $tag_id = $catalogue_id->id;
            }
            $data = [
                'title' => $item['title'],
                'description' => $item['body_html'],
                'price' => $item['compare_at_price_min'],
                'price_sale' => $item['price_min'],
                'image_json' => json_encode($item['images']),
                'catalogue_id' => 15,
                'attrs' => json_encode($attrs),
                'catalogue' => json_encode([13, 15]),
                'slug' => slug($item['title']),
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
                'publish' => 0,
                'tag_id' => $tag_id,
                'userid_created' => Auth::user()->id,
                // 'options_with_values' => $item['options_with_values'],
            ];
            $id = \App\Models\Product::insertGetId($data);
        }
        die;*/


        $fcSystem = $this->system->fcSystem();

        $slideHome = Cache::remember('slideHome', 10000, function () {
            $slideHome = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'bannerHome'])->with('slides')->first();
            return $slideHome;
        });



        $partner = Cache::remember('partner', 10000, function () {
            $partner = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'partner'])->with('slides')->first();
            return $partner;
        });
        $cpOne = Cache::remember('cpOne', 10000, function () {
            $cpOne = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'cp-one'])->with('slides')->first();
            return $cpOne;
        });
        $cpTwo = Cache::remember('cpTwo', 10000, function () {
            $cpTwo = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'cp-two'])->with('slides')->first();
            return $cpTwo;
        });
        $cpThree = Cache::remember('cpThree', 10000, function () {
            $cpThree = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'cp-three'])->with('slides')->first();
            return $cpThree;
        });
        $cpFour = Cache::remember('cpFour', 10000, function () {
            $cpFour = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'cp-four'])->with('slides')->first();
            return $cpFour;
        });
        $ishomeCategoryProduct =
            \App\Models\CategoryProduct::select('id', 'title', 'slug')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        /* 
        $homeNews =
            \App\Models\CategoryArticle::select('id', 'title', 'slug')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
            ->with(['posts' => function ($query) {
                $query->limit(4)->get();
            }])
            ->first();
        $homeServices =
            \App\Models\CategoryArticle::select('id', 'title', 'slug', 'description')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'isaside' => 1])
            ->with(['posts' => function ($query) {
                $query->limit(4)->get();
            }])
            ->first();
        $homeProduct =
            \App\Models\Product::select('id', 'title', 'slug', 'image')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->limit(12)
            ->get(); */
        //page: HOME
        $page = Page::with('fields')->where(['alanguage' => config('app.locale'), 'page' => 'index', 'publish' => 0])->select('id', 'title', 'image', 'meta_title', 'meta_description')->first();
        $fields = [];
        if (!empty($page->fields) && count($page->fields) > 0) {
            foreach ($page->fields as $item) {
                $fields[$item->meta_key] = !empty($item->meta_value) ? json_decode($item->meta_value) : [];
            }
        }

        $seo['canonical'] = url('/');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        return view('homepage.home.index', compact('page', 'seo', 'fcSystem', 'slideHome', 'partner', 'cpOne', 'cpTwo', 'cpThree', 'fields', 'cpFour', 'ishomeCategoryProduct'));
    }
    public function sitemap()
    {
        /*
        $Tags = \App\Models\Tag::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get();
        $Brands = \App\Models\Brand::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get(); */
        $router = DB::table('router')->select('slug', 'created_at')->get();
        return response()->view('homepage.home.sitemap', compact('router'))->header('Content-Type', 'text/xml');
    }
}

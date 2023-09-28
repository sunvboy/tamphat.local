<?php

namespace App\Http\Controllers\tour\backend\category;

use App\Components\Helper;
use App\Components\Nestedsetbie;
use App\Components\Polylang;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
    protected $Nestedsetbie;
    protected $Helper;
    protected $Polylang;
    protected $table = 'tours';
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'tour_categories'));
        $this->Helper = new Helper();
        $this->Polylang = new Polylang();
    }
    public function index(Request $request)
    {
        $module = $this->table;
        $data =  Tour::where(['alanguage' => config('app.locale')])
            ->with('user:id,name')
            ->with(['catalogues_relationships' => function ($query) {
                $query->select('catalogues_relationships.moduleid', 'tour_categories.title', 'tour_categories.id')
                    ->where('module', '=', $this->table)
                    ->join('tour_categories', 'tour_categories.id', '=', 'catalogues_relationships.catalogueid');
            }])
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'DESC');
        $keyword = $request->keyword;
        $catalogueid = $request->catalogueid;
        if (!empty($keyword)) {
            $data =  $data->where($this->table . '.title', 'like', '%' . $keyword . '%');
        }
        $data = $data->join('catalogues_relationships', $this->table . '.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', $this->table);
        if (!empty($catalogueid)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $catalogueid);
        }
        $data =  $data->select('tours.id', 'tours.image', 'tours.title', 'tours.slug', 'tours.tour_category_id', 'tours.user_id', 'tours.created_at', 'tours.publish', 'tours.order', 'tours.ishome', 'tours.highlight', 'tours.isaside', 'tours.isfooter');
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        $data =  $data->paginate(env('APP_paginate'));
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        if (is($catalogueid)) {
            $data->appends(['catalogueid' => $catalogueid]);
        }
        $htmlOption = $this->Nestedsetbie->dropdown([], config('app.locale'));
        $configIs = \App\Models\Configis::select('title', 'type')->where(['module' => $this->table, 'active' => 1])->get();
        return view('tour.backend.tour.index', compact('data', 'module', 'htmlOption', 'configIs'));
    }


    public function create()
    {
        $dropdown = getFunctions();
        $module = $this->table;
        $htmlCatalogue = $this->Nestedsetbie->dropdown([], config('app.locale'));
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        return view('tour.backend.tour.create', compact('module', 'htmlCatalogue',  'dropdown', 'field'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' =>  ['required', Rule::unique('router')->where(function ($query) use ($request) {
                return $query->where('alanguage', config('app.locale'));
            })],
            'tour_category_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn bài viết là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn bài viết đã tồn tại.',
            'tour_category_id.gt' => 'Danh mục là trường bắt buộc.',
        ]);
        if (!empty($request->file('image'))) {
            $image_url = uploadImageNone($request->file('image'), 'tours');
        } else {
            $image_url = $request->image_old;
        }
        $this->submit($request, 'create', 0, $image_url);
        return redirect()->route('tours.index')->with('success', "Thêm mới tour thành công");
    }
    public function edit($id)
    {
        $dropdown = getFunctions();
        $module = $this->table;
        $detail  = Tour::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('articles.index')->with('error', "Tour không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown([], config('app.locale'));
        $getCatalogue = [];
        if (old('catalogue')) {
            $getCatalogue = old('catalogue');
        } else {
            $getCatalogue = json_decode($detail->catalogue);
        }
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        return view('tour.backend.tour.edit', compact('module', 'detail', 'htmlCatalogue', 'dropdown', 'getCatalogue', 'field'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:router,slug,' . $id . ',moduleid,alanguage,' . config('app.locale') . '',
            'slug' => ['required', Rule::unique('router')->where(function ($query) use ($id) {
                return $query->where('moduleid', '!=', $id)->where('alanguage', config('app.locale'));
            })],
            'tour_category_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'tour_category_id.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        //upload image
        if (!empty($request->file('image'))) {
            $image_url = uploadImage($request->file('image'), 'tours');
        } else {
            $image_url = $request->image_old;
        }
        //end
        $this->submit($request, 'update', $id, $image_url);
        return redirect()->route('tours.index')->with('success', "Cập nhập tour thành công");
    }

    public function submit($request = [], $action = '', $id = 0, $image_url = '')
    {
        if ($action == 'create') {
            $time = 'created_at';
        } else {
            $time = 'updated_at';
        }
        //danh mục phụ
        $catalogue = $request['catalogue'];
        $tmp_catalogue[] = (int)$request['tour_category_id'];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['tour_category_id']) {
                    $tmp_catalogue[] = (int)$v;
                }
            }
        }
        //lấy danh mục cha (nếu có)
        $detail = TourCategory::select('id', 'title', 'slug', 'lft')->where('id', $request['tour_category_id'])->first();
        $breadcrumb = TourCategory::select('id', 'title')->where('alanguage', config('app.locale'))->where('lft', '<=', $detail->lft)->where('rgt', '>=', $detail->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        if ($breadcrumb->count() > 0) {
            foreach ($breadcrumb as $v) {
                $tmp_catalogue[] = $v->id;
            }
        }
        $tmp_catalogue = array_unique($tmp_catalogue);
        //end
        $_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'price' => $request['price'],
            'code' => $request['code'],
            'tour_category_id' => $request['tour_category_id'],
            'image' => !empty($image_url) ? $image_url : '',
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'description' => $request['description'],
            'content' => $request['content'],
            'catalogue' => json_encode($tmp_catalogue),
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            'user_id' => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Tour::insertGetId($_data);
        } else {
            Tour::find($id)->update($_data);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa bảng router
                DB::table('router')->where(['moduleid' => $id, 'module' => $this->table])->delete();
                //xóa catalogue_relationship
                DB::table('catalogues_relationships')->where(['moduleid' => $id, 'module' => $this->table])->delete();
                //xóa custom fields
                DB::table('config_postmetas')->where(['module_id' => $id, 'module' => $this->table])->delete();
                $this->Polylang->insert($this->table, $request['language'], $id);
            }
            //thêm vào bảng catalogue_relationship
            $this->Helper->catalogue_relation_ship($id, $request['tour_category_id'], $tmp_catalogue, $this->table);
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => $this->table,
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
            ]);
            //START: custom fields
            fieldsInsert($this->table, $id, $request);
            //END
        }
    }
}

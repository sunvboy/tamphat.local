<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'parentid', 'description', 'image', 'meta_title', 'meta_description', 'user_id', 'created_at', 'updated_at', 'publish', 'order', 'alanguage'
    ];
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function posts()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid')
            ->join('tours', 'tours.id', '=', 'catalogues_relationships.moduleid')
            ->where(['tours.publish' => 0, 'module' => 'tours'])
            ->select('tours.image_json', 'catalogues_relationships.moduleid', 'tours.id', 'tours.code', 'tours.title', 'tours.slug', 'tours.image', 'tours.price', 'catalogues_relationships.catalogueid')
            ->orderBy('tours.order', 'asc')->orderBy('tours.id', 'desc')
            ->limit(6);
    }
}

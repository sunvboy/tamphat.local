<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'room_category_id',
        'catalogue',
        'image',
        'image_json',
        'catalogue',
        'image',
        'content',
        'description',
        'meta_title',
        'meta_description',
        'user_id',
        'created_at',
        'updated_at',
        'publish',
        'order',
        'alanguage',
        'price',
        'code',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function catalogues_relationships()
    {
        return $this->hasMany(Catalogues_relationships::class, 'moduleid');
    }
}

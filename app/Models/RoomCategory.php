<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'parentid', 'description', 'image', 'meta_title', 'meta_description', 'user_id', 'created_at', 'updated_at', 'publish', 'order', 'alanguage'
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

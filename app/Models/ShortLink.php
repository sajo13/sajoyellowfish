<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;
    protected $table="short_links";
    protected $fillable = [
        'title', 'user_id','short_url','url'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }
}

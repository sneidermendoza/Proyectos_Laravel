<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'iframe',
        'image',
        'user_id',
    ];

    /**
     * @return array
     */
    public function sluggable()
    {
        return[
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];

    }

    public function user()
    {
        return $this->belongsto(User::class);
    }


    public function getGetExcerptAttribute()
    {
        return substr( $this->body, 0 ,140);
    }

    public function getGetImagenAttribute()
    {
        if ($this->imagen) {
            return url("storage/$this->imagen");
        }
    }
}

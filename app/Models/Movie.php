<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'synopsis',
        'poster',
        'year',
        'duration',
        'trailer',
        'available',
        'genre_id',
    ];

    protected static function boot()
    {
        parent::boot();

        // Set UUID secara otomatis saat create
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id','id');
    }

    public function cast()
    {
        return $this->BelongsToMany(Cast::class, 'cast_movies', 'movie_id', 'cast_id');
    }

    
}

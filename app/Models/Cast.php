<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name', 'age', 'biodata', 'avatar'
    ];
    
    public function cast_movie()
    {
        return $this->hasMany(CastMovie::class, 'cast_id','id');
    }
}

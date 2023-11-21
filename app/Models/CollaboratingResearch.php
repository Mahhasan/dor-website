<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratingResearch extends Model
{
    use HasFactory;
    protected $table = 'collaborating_researches';
    protected $fillable = [
        'institute_name',
        'slug',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->institute_name);
        });
    }
}

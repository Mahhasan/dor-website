<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'faculty_id',
        'full_name',
        'short_name',
        'slug',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->full_name); // Generate the slug based on the title
        });
    }
    public function faculties()
    {
        return $this->belongsTo('App\Models\Faculty', 'faculty_id');
    }
}

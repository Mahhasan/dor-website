<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture',
        'slider_serial',
        'is_visible',
    ];
}

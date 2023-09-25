<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceOfPublication extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
    ];
}

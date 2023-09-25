<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'volume',
        'file',
    ];
}

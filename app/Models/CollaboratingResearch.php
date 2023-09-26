<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratingResearch extends Model
{
    use HasFactory;
    protected $table = 'collaborating_researches';
    protected $fillable = [
        'institute_name',
    ];
}

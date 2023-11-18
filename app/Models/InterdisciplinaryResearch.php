<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterdisciplinaryResearch extends Model
{
    use HasFactory;
    protected $table = 'interdisciplinary_researches';
    protected $fillable = [
        'discipline',
        'lab_name',
        'lab_number',
        'link',
        'picture',
        'person_name',
        'designation',
        'cell',
        'email',
    ];
}

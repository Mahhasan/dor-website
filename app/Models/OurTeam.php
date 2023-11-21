<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'email',
        'cell',
        'department',
        'faculty_id',
        'picture',
        'level',
    ];
    public function faculties()
    {
        return $this->belongsTo('App\Models\Faculty', 'faculty_id');
    }
}

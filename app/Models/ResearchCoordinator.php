<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchCoordinator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'email',
        'cell',
        'department_id',
        'faculty_id',
        'picture',
    ];
    public function departments()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
    public function faculties()
    {
        return $this->belongsTo('App\Models\Faculty', 'faculty_id');
    }
}

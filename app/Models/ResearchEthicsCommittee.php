<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchEthicsCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'faculty_name',
        'position',
    ];
}
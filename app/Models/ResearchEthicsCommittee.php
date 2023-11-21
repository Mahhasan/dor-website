<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchEthicsCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'department_id',
        'designation',
        'committee_name',
        'position',
    ];
    public function departments()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
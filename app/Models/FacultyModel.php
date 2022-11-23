<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'organizational',
        'major',
    ];
}

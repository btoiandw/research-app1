<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'research_id',
        'user_id',
        'pc',
    ];
}

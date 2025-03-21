<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'profession',
        'besoin',
        'cv_path'
    ];
}

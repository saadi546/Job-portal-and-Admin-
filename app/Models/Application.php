<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'portfolio_link',
        'resume_path',
        'cover_letter',
    ];

}

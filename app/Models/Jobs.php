<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_image',
        'job_title',
        'job_location',
        'published_date',
        'salary',
        'job_nature',
        'job_description',
        'responsibility',
        'job_summary',
        'company_details',
        'qualifications',        
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobid()
    {
        return $this->belongsTo(Application::class);
    }
    
}

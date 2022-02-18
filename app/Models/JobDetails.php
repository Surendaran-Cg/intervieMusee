<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    use HasFactory;

    protected $table = 'jobdetails';

    protected $fillable = [
        'user_id',
        'current_company',
        'designation',
        'location',
    ];

}

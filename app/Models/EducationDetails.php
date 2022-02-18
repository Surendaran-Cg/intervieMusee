<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    use HasFactory;

    protected $table = 'educationdetails';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'pass_out',
        'branch',
        'college',
    ];

}

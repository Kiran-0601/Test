<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name', 'company_name', 'dob', 'adress','country','state','city','profile_image'
    ];

    protected $table = "employee";
}

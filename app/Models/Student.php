<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it follows Laravel naming conventions)
    protected $table = 'students';

    // Define fillable properties for mass assignment
    protected $fillable = [
        'name',
        'email',
        'age',
        'course',
        'batch',
    ];
}

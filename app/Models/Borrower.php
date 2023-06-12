<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrowers';
    protected $fillable =[
        'studentid',
        'name',
        'course',
        'yearandsection',
        'nameofthebook',
        'authorofthebook',
        'image',
        'published',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    public $timestamps = true;

   /* protected $casts = [
        'cost' => 'float'
    ]; */

    protected $fillable = [
        'roomnumber',
        'telephone',
        'studentid',
        'name',
        'surname'
    ];
}

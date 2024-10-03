<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pepole extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'gender',
        'phone'
    ];
}

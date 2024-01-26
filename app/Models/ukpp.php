<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ukpp extends Model
{
    use HasFactory;
    protected $table = "ukpps";
    protected $guarded = ["id"];
}

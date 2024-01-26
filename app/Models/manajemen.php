<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manajemen extends Model
{
    use HasFactory;
    protected $table = "manajemens";
    protected $guarded = ["id"];
}

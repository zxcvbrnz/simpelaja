<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_pelayanan extends Model
{
    use HasFactory;
    protected $table = "nilai_pelayanans";
    protected $guarded = ["id"];
}

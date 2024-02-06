<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iks extends Model
{
    use HasFactory;
    protected $table = "iks";
    protected $guarded = ["id"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subprogram extends Model
{
    use HasFactory;
    protected $table = "subprograms";
    protected $guarded = ["id"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submanajemen extends Model
{
    use HasFactory;
    protected $table = "submanajemens";
    protected $guarded = ["id"];
}

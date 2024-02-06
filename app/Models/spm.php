<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spm extends Model
{
    use HasFactory;
    protected $table = "spms";
    protected $guarded = ["id"];
}

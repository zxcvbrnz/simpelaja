<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;
    protected $table = "desas";
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

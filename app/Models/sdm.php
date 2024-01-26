<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sdm extends Model
{
    use HasFactory;
    protected $table = "sdms";
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

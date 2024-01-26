<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $guarded = ["id"];

    public function profil()
    {
        return $this->hasOne(profile::class, 'id_users', 'id');
    }

    public function desa()
    {
        return $this->hasMany(desa::class, 'id_users', 'id');
    }

    public function sdm()
    {
        return $this->hasMany(sdm::class, 'id_users', 'id');
    }

    public function nilai_ukm()
    {
        return $this->hasMany(nilai_ukm::class, "id_users", "id");
    }

    public function nilai_manajemen()
    {
        return $this->hasMany(nilai_manajemen::class, "id_users", "id");
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}

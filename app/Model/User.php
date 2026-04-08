<?php

namespace App\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Model
{
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
        'kelas'
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'rememberToken'
    ];


    /**
     * @return array<string,string>
     */

    public function Aspirasi()
    {
        return $this->hasMany(Aspirasi::class,'siswa_id');
    }
};

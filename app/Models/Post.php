<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'address', 'city_state_zip', 'homephone', 'cellphone', 'email', 'appliedposition', 'expectedsalary'
    ];

    public function pendidikann()
    {
        return $this->hasMany(Pendidikan::class, 'post_id');
    }

    public function pekerjaann()
    {
        return $this->hasMany(RiwayatPekerjaan::class, 'post_id');
    }

    public function pelatihann()
    {
        return $this->hasMany(RiwayatPelatihan::class, 'post_id');
    }
}

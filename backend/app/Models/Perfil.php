<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Perfil extends Model {

    use HasFactory;

    protected $table = 'perfil';

    protected $primaryKey = 'id';

    public function relUsers () {
        return $this->hasMany(User::class, 'id_perfil');
    }
}

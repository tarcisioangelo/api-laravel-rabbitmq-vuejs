<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profile extends Model {

    protected $table = 'profile';

    protected $primaryKey = 'id';

    public function relUsers () {
        return $this->hasMany(User::class, 'id_profile');
    }
}

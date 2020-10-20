<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';

    protected $primaryKey = 'id';

    public function relProducts () {
        return $this->hasMany(Product::class, 'id_category');
    }
}

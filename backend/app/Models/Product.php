<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;

class Product extends Model {

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'id_user',
        'id_category',
    ];

    public function relUsers () {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function relCategories () {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}

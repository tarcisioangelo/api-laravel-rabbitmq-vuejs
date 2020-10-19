<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Purchase extends Model {

    use HasFactory;

    protected $table = 'purchase';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_product',
        'quantity',
        'total',
        'status',
        'id_user',
    ];

    public function relProduct () {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}

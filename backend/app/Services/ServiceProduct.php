<?php

namespace App\Services;

use App\Models\Product;

class ServiceProduct {
    private $dbProduct;

    public function __construct() {
        $this->dbProduct = new Product();
    }

    public function listProducts() {
        return $this->dbProduct
            ->join('users', 'users.id', '=', 'products.id_user')
            ->select(
                'users.name as author'
                , 'products.id', 'products.name', 'products.price', 'products.description'
            )
            ->get();

    }

    public function find($id) {
        $product = $this->dbProduct->find($id);

        if($product === null) {
            throw new \Exception('Product not found by ID ' . $id);
        }

        return $product;
    }

    public function save($data) {
        $user = auth()->user();

        $objProduct = [
            'id_user' => $user->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'id_category' => $data['category']
        ];

        if($data['id']) {
            return $this->dbProduct
                ->where('id', $data['id'])
                ->update($objProduct);
        }

        return $this->dbProduct->create($objProduct);
    }

    public function delete($id) {
        return $this->dbProduct->where('id', $id)->delete();
    }


}

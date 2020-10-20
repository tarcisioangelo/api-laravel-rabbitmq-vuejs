<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceProduct;

class ProductsController extends Controller
{
    private $srvProduct;

    public function __construct() {
        $this->srvProduct = new ServiceProduct();
    }

    public function index() {
        try {
            return $this->srvProduct->listProducts();
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function find($id) {
        try {
            return $this->srvProduct->find($id);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $data = $request->only(['name', 'description', 'price', 'category']);

            $product = $this->srvProduct->save($data);

            return ['message' => 'Cadastro realizado com sucesso!', 'product' => $product];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


}

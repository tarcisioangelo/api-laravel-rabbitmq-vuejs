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
            $data = $request->only(['id', 'name', 'description', 'price', 'category']);

            $message = 'Cadastro realizado com sucesso!';

            $product = $this->srvProduct->save($data);

            if($data['id']) {
                $message = 'Atualizado com sucesso';
            }

            return ['message' => $message, 'product' => $product];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function delete($id) {
        try {
            if(!$id) {
                throw new \Exception('ID é obrigatório');
            }

            $this->srvProduct->delete($id);

            return ['message' => 'Excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


}

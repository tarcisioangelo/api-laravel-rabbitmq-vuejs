<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductsController extends Controller
{
    private $objProduct;

    public function __construct() {
        $this->objProduct = new Product();
    }

    public function index() {
        return $this->objProduct->all();
    }

    public function find($id) {
        try {
            $product = $this->objProduct->find($id);

            if($product === null) {
                throw new \Exception('Product not found by ID ' . $id);
            }

            return $product;
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $user = auth()->user();

            $data = [
                'id_user' => $user->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'id_category' => $request->category
            ];

            $this->objProduct->create($data);

            return ['success' => true, 'message' => 'Cadastro realizado com sucesso!', 'data' => $data];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

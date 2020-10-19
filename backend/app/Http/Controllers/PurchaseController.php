<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Parameter;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Product;

use App\Services\MessageService;

class PurchaseController extends Controller
{
    private $db;
    private $dbProduct;

    public function __construct() {
        $this->db = new Purchase();
        $this->dbProduct = new Product();
    }

    public function index() {
        try {
            $user = auth()->user();

            $data = $this->db->all();

            return ['purchases' => $data];
        } catch (\Exception $e) {
            return ['error' => false, 'message' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $user = auth()->user();

            $product = $this->dbProduct->find($request->product);

            $data = [
                'id_user' => $user->id,
                'id_product' => $request->product,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'status' => 0,
            ];

            $this->db->create($data);

            $dataMessage = [
                'product_id' => $request->product,
                'product_name' => $product->name,
                'product_description' => $product->name,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'status' => 0,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
            ];

            /**
             * Enviando dados para o serviço de mensageria
             */
            $messageService = new MessageService();

            $messageService->purchaseNew($dataMessage);

            return ['success' => true, 'message' => 'Compra realizada com sucesso!'];
        } catch (\Exception $e) {
            return ['error' => false, 'message' => $e->getMessage()];
        }
    }

}

<?php

namespace App\Services;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Product;

use App\Services\MessageService;

class ServicePurchase {
    private $dbPurchase;

    public function __construct() {
        $this->dbPurchase = new Purchase();
    }

    public function listMyPurchases() {
        $user = auth()->user();

        return $this->dbPurchase
            ->join('users', 'users.id', '=', 'purchase.id_user')
            ->join('products', 'products.id', '=', 'purchase.id_product')
            ->select(
                'users.name as author'
                , 'products.id', 'products.name', 'products.price', 'products.description'
            )
            ->where('purchase.id_user', $user->id)
            ->get();

    }

    public function save($data) {
        $user = auth()->user();

        $idProduct = $data['product'];

        $dbProduct = new Product();

        $product = $dbProduct->find($idProduct);

        if($product === null) {
            throw new \Exception('Produto não encontrado com ID:' . $idProduct);
        }

        $data = [
            'id_user' => $user->id,
            'id_product' => $product->id,
            'quantity' => $data['quantity'],
            'total' => $data['total'],
            'status' => 0,
        ];

        $this->dbPurchase->create($data);

        $dataMessage = [
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_description' => $product->name,
            'quantity' => $data['quantity'],
            'total' => $data['total'],
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
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Parameter;

use App\Services\ServicePurchase;

class PurchaseController extends Controller {

    private $srvPurchase;

    public function __construct() {
        $this->srvPurchase = new ServicePurchase();
    }

    public function index() {
        try {
            $data = $this->srvPurchase->listMyPurchases();

            return ['purchases' => $data];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $data = $request->only(['product', 'quantity', 'total']);

            $this->srvPurchase->save($data);

            return ['message' => 'Compra realizada com sucesso!'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

}

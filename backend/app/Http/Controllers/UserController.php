<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Parameter;

use App\Services\ServiceUser;

class UserController extends Controller
{
    private $srvUser;

    public function __construct() {
        $this->srvUser = new ServiceUser();
    }

    public function index() {
        try {
            $data = $this->srvUser->listAll();

            return ['users' => $data];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function find($id) {
        try {
            return $this->srvUser->find($id);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $data = $request->only(['name', 'email', 'password']);

            $user = $this->srvUser->save($data);

            return ['message' => 'Cadastro realizado com sucesso!', 'data' => $user];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

}

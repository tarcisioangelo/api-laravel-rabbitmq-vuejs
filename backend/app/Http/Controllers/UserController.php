<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Parameter;

use App\Models\User;
use App\Models\Perfil;

class UserController extends Controller
{
    private $objUser;
    private $objPerfil;

    public function __construct() {
        $this->objUser = new User();
        $this->objPerfil = new Perfil();
    }

    public function index() {
        try {
            $user = auth()->user();

            $data = $this->objUser->all(['id', 'name', 'email']);

            return ['User Auth' => $user->name, 'users' => $data];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function find($id) {
        try {
            $user = $this->objUser->find($id, ['id', 'name', 'email']);

            if($user === null) {
                throw new \Exception('User not found by ID ' . $id);
            }

            return $user;
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function store(Request $request) {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'id_perfil' => 2
            ];

            $this->objUser->create($data);

            return ['success' => true, 'message' => 'Cadastro realizado com sucesso!'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

}

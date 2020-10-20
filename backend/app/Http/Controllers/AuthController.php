<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Services\ServiceUser;

class AuthController extends Controller {

    private $srvUser;

    public function __construct() {
        $this->srvUser = new ServiceUser();
    }

    public function login(Request $request) {
        try {
            $credentials = $request->only("email", "password");

            if (! $token = auth('api')->attempt($credentials)) {
                throw new \Exception('Usuário não encontrado!');
            }

            $user = $this->srvUser->findForEmail($credentials['email']);

            return $this->respondWithToken($token, $user);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }

    }

    protected function respondWithToken($token, $user) {
        return response()->json([
            'name' => $user->name,
            'profile' => $user->profile,
            'profileID' => $user->idProfile,
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}

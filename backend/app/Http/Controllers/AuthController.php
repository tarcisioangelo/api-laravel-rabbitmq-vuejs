<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller {

    private $objUser;

    public function __construct() {
        $this->objUser = new User();
    }

    public function login(Request $request) {
        try {
            $credentials = $request->only("email", "password");

            if (! $token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $user = $this->objUser->where('email', $credentials['email'])->first();

            return $this->respondWithToken($token, $user);
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }

    }

    protected function respondWithToken($token, $user) {
        return response()->json([
            'name' => $user->name,
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}

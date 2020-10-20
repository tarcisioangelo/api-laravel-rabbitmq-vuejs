<?php

namespace App\Services;

use App\Models\User;

class ServiceUser {
    private $dbUser;

    public function __construct() {
        $this->dbUser = new User();
    }

    public function listAll() {
        return $this->dbUser
            ->join('profile', 'users.id_profile', '=', 'profile.id')
            ->select(
                'users.id', 'users.name', 'users.email'
                , 'profile.id as idProfile', 'profile.description as profile',
            )
            ->get();
    }

    public function find($id) {
        $user = $this->dbUser->find($id, ['id', 'name', 'email']);

        if($user === null) {
            throw new \Exception('Usuário não encontrado com ID ' . $id);
        }

        return $user;
    }

    public function save($data) {

        $user = $this->dbUser->where('email', $data['email'])->first();

        if($user) {
            throw new \Exception('E-mail já cadastrado');
        }

        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'id_profile' => 2
        ];

        return $this->dbUser->create($dataUser);
    }


}

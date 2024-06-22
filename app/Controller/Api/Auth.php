<?php

namespace App\Controller\Api;
use \App\Model\Entity\User;

use Firebase\JWT\JWT;

Class Auth extends Api{

    /**
     * Método responsavel por gerar um token JWT
     * @param Request $request 
     * @return array
     */
    public static function generateToken($request){
        // POST VARS
        $postVars = $request->getPostVars();

        // VALIDA OS CAMPOS OBRIGATÓRIOS
        if(!isset($postVars['email']) || !isset($postVars['senha']) ){
            throw new \Exception("Os campos 'email' e 'senha' são obrigatórios", 400);            
        }

        // BUSCA USUÁRIO PELO EMAIL
        $obUser = User::getUserByEmail($postVars['email']);
        if(!$obUser instanceof User){
            throw new \Exception("O usuário ou senha são inválidos", 400);
        }

        // VALIDA A SENHA DO USUÁRIO
        if(!password_verify($postVars['senha'], $obUser->senha)){
            throw new \Exception("O usuário ou senha são inválidos", 400);
        }
        
        // PAYLOAD
        $payload = [
            'email' => $obUser->email
        ];

        // RETORNA O TOKEN GERADO
        return [
            'token' => JWT::encode($payload, getenv('JWT_KEY'), 'HS256')
        ];
    }
}
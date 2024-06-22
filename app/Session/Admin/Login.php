<?php
    namespace App\Session\Admin;

    Class Login{
        /**
         * Método responsável por iniciar a sessão
         */
        private static function init(){
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
        }

        /**
         * Método responsável por criar o login do usuário
         * @param User $obUser
         * @return boolean
         */
        public static function login($obUser){
            self::init();

            $_SESSION['admin']['usuario'] = [
                'id'    => $obUser->senha,
                'nome'  => $obUser->nome,
                'email' => $obUser->email,
            ];

            // SUCESSO
            return true;
        }

        /**
         * Método responsável por verificar se o usuário está logado
         * @return boolean
         */
        public static function isLogged(){
            // INICIA A SESSÃO
            self::init();

            // RETORNA A VERIFICAÇÃO
            return isset($_SESSION['admin']['usuario']['id']);
        }

        /**
         * Método responsável por executar o logout do usuário
         * @return boolean
         */
        public static function logout(){
            // INICIA A SESSÃO
            self::init();
            
            // DESLOGA O USUÁRIO
            unset($_SESSION['admin']['usuario']);

            // SUCESSO
            return true;
        }
    }
<?php

    namespace App\Model\Entity;
    use \WilliamCosta\DatabaseManager\Database;

    Class User{

        /**
         * ID do usuário
         * @var integer
         */
        public $id;
        
        /**
         * Nome do usuário
         * @var string
         */
        public $nome;

        /**
         * E-mail do usuário
         * @var string
         */
        public $email;

        /**
         * Senha do usuário
         * @var string
         */
        public $senha;

        /**
         * Método responsável por cadastrar a instancia atual no banco de dados
         * @return boolean
         */
        public function cadastrar(){
            // INSERE A INSTANCIA NO BANCO DE DADOS
            $this->id = (new Database('usuario'))->insert([
               'nome'  => $this->nome,
               'email' => $this->email,
               'senha' => $this->senha,
            ]);
            
            // SUCESSO
            return true;
        }        

        /**
         * Método responsável por atualizar os dados do banco com a instancia atual
         * @return boolean
         */
        public function atualizar(){
            // ATUALIZA O USUÁRIO NO BANCO DE DADOS
            return (new Database('usuario'))->update('id = '.$this->id, [            
                'nome'  => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha,
             ]);
        }

        /**
         * Método responsável por excluir um usuário do banco de dados
         * @return boolean
         */
        public function excluir(){
            // EXCLUI O USUÁRIO DO BANCO DE DADOS
            return (new Database('usuario'))->delete('id = '. $this->id);
        } 
        
        /**
         * Método responsável por retornar um usuário com base no seu ID
         * @param integer $id
         * @return User
         */

         public static function getUserById($id){
            return self::getUsers('id = '.$id)->fetchObject(self::class);
        }

        /**
         * Método responsável por retornar um usuário com base em seu e-mail
         * @param string $email
         * @return User
         */
        public static function getUserByEmail($email){
            return self::getUsers('email = "'.$email.'"')->fetchObject(self::class);
        }

        /**
         * Método responsável por retornar usuários
         * @param string $where
         * @param string $order 
         * @param string $limit
         * @param string $fields
         * @param string $fileds
         * @return PDOStatement
         */
        public static function getUsers($where = null, $order = null, $limit = null, $fields = '*'){
            return (new Database('usuario'))->select($where, $order, $limit, $fields);
        }

    }   
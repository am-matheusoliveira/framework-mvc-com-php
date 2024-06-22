<?php 
    
    namespace App\Http;
    
    Class Request{

        /**
         * Instancia de Router
         * @var Router
         */

        private $router;

        /**
         * Método HTTP da requisição
         * @var string
         * 
         */        
        private $httpmethod;

        /**
         * URI da página
         * @var string
         */
        private $uri;

        /**
         * Parâmetros da URL ($_GET)
         * @var array
         */
        private $queryParams = [];

        /**
         * Variáveis recebidas no POST da página ($_POST)
         * @var array
         */
         private $postVars = [];

        /**
         * Cabeçalho da requisição
         * @var array
         */
        private $headers = [];

        public function  __construct($router){
            $this->router = $router;
            $this->queryParams = $_GET ?? [];
            $this->headers     = getallheaders();
            $this->httpmethod  = $_SERVER['REQUEST_METHOD'] ?? '';
            $this->setUri();
            $this->setPostVars();
        }

        /**
         * Método resposável por definir as variáveis do POST
         */
        private function setPostVars(){
            // VERIFICA O MÉTODO DA RQUISIÇÃO
            if($this->httpmethod == 'GET') return false;

            //POST PADRÃO
            $this->postVars = $_POST ?? [];

            // POST JSON
            $inputRaw = file_get_contents('php://input');
            $this->postVars = (strlen($inputRaw) && empty($_POST)) ? json_decode($inputRaw, true) : $this->postVars;

            // echo('<pre>');
            // print_r($inputRaw);
            // echo('</pre>');
            // exit;
        }

        /**
         * Método responsável por definir a URI
         */

        public function setUri(){
            // URI COMPLETA (COM GETS)
            $this->uri = $_SERVER['REQUEST_URI'] ?? '';

            //REMOVE GETS DA URI
            $xURI = explode('?', $this->uri);
            $this->uri = $xURI[0];
        }

        /**
         * Método responsável por retornar a instancia de Router
         * @return Router
         */
        public function getRouter(){
            return $this->router;
        }

        /**
         * Método responsavel por retorna o método HTTP da requisição
         * @return string 
         */
        public function getHttpMethod(){
            return $this->httpmethod;
        }

        /**
         * Método responsavel por retorna a URI  da requisição
         * @return string 
         */
        public function getUri(){
            return $this->uri;
        }

        /**
         * Método responsavel por retorna os headers da requisição
         * @return array
         */
        public function getHeaders(){
            return $this->headers;
        }

        /**
         * Método responsavel por retorna os parâmetros da URL da requisição
         * @return array
         */
        public function getQueryParams(){
            return $this->queryParams;
        }

        /**
         * Método responsavel por retorna as variáveis POST da requisição
         * @return array
         */
        public function getPostVars(){
            return $this->postVars;
        }        
    }

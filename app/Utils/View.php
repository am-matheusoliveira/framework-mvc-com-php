<?php

    namespace App\Utils;

    Class View{

        /**
         * Variáveis padrões da view
         * @var array
         */
        private static $vars = [];

        /**
         * Método responsavel por definir os daddos da classe
         * @param array $vars
         */
        public static function init($vars = []){
            self::$vars = $vars;
        }         

        /**
         * Método que retorna o conteúdo de uma view
         * @param string $view
         * @return string
         */
        private static function getContentView($view){
            $file = __DIR__.'/../../resources/view/'.$view.'.html';

            return file_exists($file) ? file_get_contents($file) : $file ;
        }


        /**
         * Método que retorna o conteúdo renderizado de uma view
         * @param string $view
         * @param array $vars 
         * @return string
         */
        public static function render($view, $vars = []){
            // CONTEÚDO DA VIEW
            $ContentView = self::getContentView($view);

            //MERGE DE VARIÁVEIS DA VIEW
            $vars = array_merge(self::$vars, $vars);

            $keys = array_keys($vars);
            $keys = array_map(function($item){
                return '{{'.$item.'}}';
            }, $keys);
            
            
            // RETORNA O CONTEÚDO RENDERIZADO
            return str_replace($keys, array_values($vars), $ContentView);
        }
    }
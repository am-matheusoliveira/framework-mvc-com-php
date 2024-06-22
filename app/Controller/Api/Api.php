<?php

namespace App\Controller\Api;

Class Api{

    /**
     * Método responsavel por retornar os detalhes da API
     * @param Request $request 
     * @return array
     */
    public static function getDetails($request){
        return [
            'nome'   => '1º API - TESTE',
            'versao' => 'v1.0.0',
            'autor'  => 'MATHEUS PEREIRA',
            'email'  => 'matheus.pereira@gmail.com',
        ];
    }

    /**
     * Método responsável por retornar os detalhes da paginação
     * @param Request $request
     * @param Pagination $obPagination
     * @return array
     */
    protected static function getPagination($request, $obPagination){
        // QUERY PARAMS
        $queryParams = $request->getQueryParams();

        // PÁGINA
        $pages = $obPagination->getPages();

        // RETORNO
        return [
            'paginaAtual'       => isset($queryParams['page']) ? (int)$queryParams['page'] : 1,
            'quantidadePaginas' => !empty($pages) ? count($pages) : 1
        ];
    }
}
<?php
    
    namespace app\Controller\Pages;

    use \App\Utils\View;

    Class Page{
        
        /**
         * Metodo responsavel por renderizar o topo da pagina
         * @return string
         */
        public static function getHeader(){
            return View::render('pages/header');
        } 

        /**
         * Método responsavel por renderizar o layout de paginação
         * @param Request $request
         * @param Pagination $obPagination
         * @return string
         */
        public static function getPagination($request, $obPagination){
            // PÁGINAS
            $pages = $obPagination->getPages();

            // VERIFICA A QUANTIDADE DE PÁGINAS
            if(count($pages) <= 1){
                return '';
            }

            // LINKS
            $links = '';

            // URL ATUAL (SEM GETS)
            $url = $request->getRouter()->getCurrentUrl();

            // GET
            $queryParams = $request->getQueryParams();

            // PÁGINA ATUAL
            $currentPage = $queryParams['page'] ?? 1;

            // LIMITE DE PÁGINAS
            $limit = getenv('PAGINATION_LIMIT');

            // MEIO DA PAGINAÇÃO
            $middle = ceil($limit/2);

            // INÍCIO DA PAGINAÇÃO
            $start = $middle > $currentPage ? 0 : $currentPage - $middle;

            // AJUSTA O FINAL DA PAGINAÇÃO
            $limit = $limit + $start;

            // AJUSTA O INÍCIO DA PAGINAÇÃO
            if($limit > count($pages)){
                $diff = $limit - count($pages);
                $start = $start - $diff;
            }
            
            // LINK INICIAL
            if($start > 0){
                $links .= self::getPaginationLink($queryParams, reset($pages), $url, '<<');
            }            

            //RENDERIZA OS LINKS
            foreach($pages as $page){
                // VERIFICA O START DA PAGINAÇÃO
                if($page['page'] <= $start){
                    continue;
                }

                // VERIFICA O LIMITE DE PAGINAÇÃO
                if($page['page'] > $limit){
                    $links .= self::getPaginationLink($queryParams, end($pages), $url, '>>');
                    break;
                }


                $links .= self::getPaginationLink($queryParams, $page, $url);
            }

            // RENDERIZA BOX DE PAGINAÇÃO
            return View::render('pages/pagination/box', [
                'links' => $links,
            ]);            
        }

        /**
         * Metodo responsavel por renderizar o rodapé da pagina
         * @return string
         */
        public static function getFooter(){
            return View::render('pages/footer');
        } 

        /**
         * Método responsável por retornar um link da paginação
         * @param array $queryParams
         * @param array $page
         * @param string $url
         * 
         * @return
         */
        private static function getPaginationLink($queryParams, $page, $url, $label = null){
            //ALTERA A PÁGINA
            $queryParams['page'] = $page['page'];
            
            //LINK
            $link = $url.'?'.http_build_query($queryParams);

            //view
            return View::render('pages/pagination/link', [
                'page' => $label ?? $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);            
        }

        /**
         * Metodo responsavel por retornar o conteudo da nossa pagina generica
         * @return string
         */

        public static function getPage($title, $content){
            return View::render('pages/page', [
                'title'   => $title,
                'header'  => self::getHeader(),
                'footer'  => self::getFooter(),
                'content' => $content
            ]);
        }
    }
<?php
    
    namespace app\Controller\Pages;

    use \App\Utils\View;
    use \App\Controller\Pages\Page;
    use \App\Model\Entity\Organization;

    Class About extends Page{
        
        /**
         * Método responsavel por retornar o conteúdo (view) da nossa página - SOBRE
         * @return string
         */

        public static function getAbout(){
            // ORGANIZAÇÃO
            $obOrganization = new Organization;
            
            // VIEW DA HOME
            $content = View::render('pages/about', [
                'id' => $obOrganization->id,
                'name' => $obOrganization->name,
                'site' => $obOrganization->site,
                'description' => $obOrganization->description,
            ]);

            // RETORNA A VIEW DA PAGINA
            return parent::getPage('SOBRE -> MATHEUS', $content);
        }
    }
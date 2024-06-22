<?php
    
    namespace app\Controller\Pages;

    use \App\Utils\View;
    use \App\Controller\Pages\Page;
    use \App\Model\Entity\Organization;

    Class Home extends Page{
        
        /**
         * Retorna uma mensagem para a view
         * @return string
         */

        public static function getHome(){
            // ORGANIZAÇÃO
            $obOrganization = new Organization;
            
            // VIEW DA HOME
            $content = View::render('pages/home', [
                'id' => $obOrganization->id,
                'name' => $obOrganization->name
            ]);

            // RETORNA A VIEW DA PAGINA
            return parent::getPage('MATHEUS - PHP', $content);
        }
    }
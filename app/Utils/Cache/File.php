<?php

namespace App\Utils\Cache;

class File{

    /**
     * Método responsável por retornar o caminho até o arquivo de cache
     * @param string $hash
     * @return string
     */
    private static function getFilePath($hash){
        // DIRETÓRO DE CACHE
        $dir = getenv('CACHE_DIR');
        
        // VERIFICA A EXISTÊNCIA DO DIRETÓRIO
        if(!file_exists($dir)){
            mkdir($dir, 0755, true);
        }

        // RETORNA O CAMINHO ATÉ O ARQUIVO
        return $dir.'/'.$hash;
    }

    /**
     * Método responsável por guardar informações no cache
     * @param string $hash
     * @param mixed $content
     * @return boolean
     */
    private static function storageCache($hash, $content){
        //SERIALIZA O RETORNO
        $serialize = serialize($content);

        // OBTÉM O CAMINHO ATÉ O ARQUIVO DE CACHE
        $cacheFile = self::getFilePath($hash);

        // GRAVA AS INFORMAÇÕES NO ARQUIVO
        return file_put_contents($cacheFile, $serialize);
    }

    /**
     * Método responsável por retornar o conteúdo gravado no cache
     * @param string $hash
     * @param integer $expitarion
     * @return mixed
     */
    private static function getcontentcache($hash, $expiration){
        // OBTÉM O CAMINHO DO ARQUIVO
        $cacheFile = self::getFilePath($hash);

        // VERIFICA A EXISTÊNCIA DO ARQUIVO
        if(!file_exists($cacheFile)){
            return false;
        }

        // VALIDA A EXPIRAÇÃO DO CACHE
        // $createTime = filectime($cacheFile);
        $createTime = filemtime($cacheFile);
        $diffTime = time() - $createTime;
        if($diffTime > $expiration){
            return false;
        }

        // RETORNA O DADO REAL
        $serialize = file_get_contents($cacheFile);
        return unserialize($serialize);
    }

    /**
     * Método responsável por obter uma informação do cache
     * @param string $hash
     * @param integer $expiration
     * @param Closure $function
     * @return mixed
     * 
     */
    public static function getCache($hash, $expiration, $function){
        // VERIFICA O CONTEÚDO GRAVADO
        if($content = self::getContentCache($hash, $expiration)){
            return $content;
        }

        // EXECUÇÃO DA FUNÇÃO
        $content = $function();

        // GRAVA O RETORNO NO CACHE
        self::storageCache($hash, $content);

        // RETORNA O CONTEÚDO
        return $content;
    }

}
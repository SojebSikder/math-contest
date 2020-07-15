<?php
/**
 * Editor Class
 */
class Editor{

    public function GetContent($file){
        $file = file_get_contents($file);

        return $file;
    }

    public function SaveContent($file, $text){
        $file = file_put_contents($file, $text, FILE_APPEND);

        return $file;
    }

    public function GetFile($dir){
        $file = scandir($dir);
        return $file;
    }
}


?>
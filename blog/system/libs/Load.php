<?php 

class Load{
    public function view($filename, $data=false){
        if($data == true){
            extract($data);
        }
        include "app/views/".$filename.".php";
    }

    public function model($modelname){
        include "app/models/".$modelname.".php";
        return new $modelname();
    }
}
?>
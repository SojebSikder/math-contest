<?php
require_once("../resources/config/conn.php");

function renderLayout($contentFile, $data = false){
    $contentFileFullpath = PublicDir . "/".$contentFile.".php";

    // making sure passed in variables are in scope of the template
    // each key in the $variables array wil become a variable

    if($data == true){
      /*  if(count($variables) > 0){
            foreach ($variable as $key => $value) {
                if(strlen($key) > 0){
                    ${$key} = $value;
                }
            }
        } */
        extract($data);
    }
    

    require_once(TEMPLATES_PATH . "/inc/header.php");

    if(file_exists($contentFileFullpath)){
        require_once($contentFileFullpath);
    }else{
        require_once(TEMPLATES_PATH . "/error.php");
    }

    require_once(TEMPLATES_PATH . "/inc/footer.php");
}

?>
<?php
/**
 * Privileged CLass
 */
class Privileged{
    private $roles;

    public function __constrict(){}

    public static function getByUsername($username){
        $sql = "SELECT * FROM register WHERE user_name = :username";
        //$sth =$GLOBALS['DB']->
    }
}


?>
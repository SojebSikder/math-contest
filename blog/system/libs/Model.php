<?php
/**
 * Main Model
 */

 class Model{
     protected $db = array();
     
     public function __construct(){
         $this->db = new Database();
     }
 }
 
?>
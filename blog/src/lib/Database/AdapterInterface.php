<?php
//namespace DB;
interface AdapterInterface{

  public function select($query);
  public function insert($query);
  public function update($query);
  public function delete($query);
 
}
?>
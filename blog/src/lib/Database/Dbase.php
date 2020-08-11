<?php
//include "MySQLAdapter.php";
//namespace DB;
Class Dbase{

  protected $adapter;
 
 public function __construct(AdapterInterface $adapter){
  $this->adapter = $adapter;
 }
 
  // Select or Read data
  public function select($query){
   return $this->adapter->select($query);
  }
  
  // Insert data
  public function insert($query){
    return $this->adapter->insert($query);
  }
    
  // Update data
  public function update($query){
    return $this->adapter->update($query);
  }
    
  // Delete data
  public function delete($query){
    return $this->adapter->delete($query);
  }
 
}
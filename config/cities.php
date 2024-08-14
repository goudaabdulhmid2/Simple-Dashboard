<?php
require 'config.php';
require 'ORM.php';

class Cities extends MysqlAdapter{

    private $table='cities';

    public function __construct(){
        global $config;

        parent::__construct($config);
    }

    public function getCities(){
        $this->select($this->table);
        return $this->fetchAll();
    }

    public function getCity($id_city){
        $this->select($this->table,'id='.$id_city);
        return $this->fetch();
    }

    // return int returns the id of the user inserted
    public function addCity(array $data){
       return $this->insert($this->table, $data);
    }

    // return int number of affectef rows
    public function updateCity($city_id,array $data){
        return $this->update($this->table, $data,'id='. $city_id);

    }
     // return int number of affectef rows
    public function deleteCity($city_id){
        return $this->delete($this->table,$city_id);
    }

    public function cityFind($city){
        return  $this->select($this->table,"city='".$city."'") ? True : false;

    }
    
}
?>
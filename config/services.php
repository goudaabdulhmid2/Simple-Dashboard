<?php
require 'config.php';
require 'ORM.php';

class Services extends MysqlAdapter{
    private $table ='services';

    public function __construct() {
        global $config;

        parent::__construct($config);
    }

    public function getServices(){
        $this->select($this->table);
        return $this->fetchAll();
    }

    public function getService($id_city){
        $this->select($this->table,'id='.$id_city);
        return $this->fetch();
    }

     // return int returns the id of the user inserted
     public function addService(array $data){
        return $this->insert($this->table, $data);
     }

     
    // return int number of affectef rows
    public function updateService($city_id,array $data){
        return $this->update($this->table, $data,'id='. $city_id);

    }
     // return int number of affectef rows
    public function deleteService($city_id){
        return $this->delete($this->table,$city_id);
    }

    public function serviceFind($city){
        return  $this->select($this->table,"service='".$city."'") ? True : false;

    }


}


?>
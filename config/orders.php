<?php
require 'config.php';
require 'ORM.php';

class Orders extends MysqlAdapter{

    private $table='orders';

    public function __construct(){
        global $config;

        parent::__construct($config);
    }

    public function getOrders(){
        $this->select($this->table);
        return $this->fetchAll();
    }

    public function getOrder($id_city){
        $this->select($this->table,'id='.$id_city);
        return $this->fetch();
    }

    // return int returns the id of the user inserted
    public function addOrder(array $data){
       return $this->insert($this->table, $data);
    }

    // return int number of affectef rows
    public function updateOrder($city_id,array $data){
        return $this->update($this->table, $data,'id='. $city_id);

    }
     // return int number of affectef rows
    public function deleteOrder($city_id){
        return $this->delete($this->table,$city_id);
    }

    public function OrderFind($city){
        return  $this->select($this->table,"city='".$city."'") ? True : false;

    }

    public function getCities(){
        $this->select('cities');
        return $this->fetchAll();
    }

    public function getServices(){
        $this->select('services');
        return $this->fetchAll();
    }
    
}
?>
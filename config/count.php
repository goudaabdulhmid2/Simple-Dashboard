<?php
require 'config.php';
require 'ORM.php';

class Counts extends MysqlAdapter{

    public function __construct(){
        global $config;

        parent::__construct($config);
    }

    public function getOrdersCount(){
        
        return $this->select('orders');
    }

    public function getCitiesCount(){
        
        return $this->select('cities');
    }

    public function getServicesCount(){
        
        return $this->select('services');
    }

    public function getAdminsCount(){
        
        return $this->select('admins');
    }
    
}
?>
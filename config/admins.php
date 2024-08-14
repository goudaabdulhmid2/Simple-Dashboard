<?php 
include "config.php";
include "ORM.php";
class Admins extends MysqlAdapter {
    
    private $table = 'admins';

    public function __construct() {
        global $config;

        parent::__construct($config);
    }

    public function getUsers(){
        $this->select($this->table);
        return $this->fetchAll();
    }

    public function getUser($id){
        $this->select($this->table,'id='.$id);
        return $this->fetch();
    }

    public function addUser(array $data){
        
        return $this->insert($this->table,$data); // return user id
    } 

    // public function addCity($city){
    //    if(!($this->select('cities','city='.$city))){
        
    //    }
       

    // }

    public function updateUser($id,array $data){
       return $this->update($this->table,$data,'id='.$id); // return int number of affectef rows
    }

    public function deleteUser($id){
        return $this->delete($this->table,$id); // return int number of affectef row
    }

    public function searchUsers($keyword){
        $this->select($this->table,"name LINK '%$keyword%' OR email LIKE '%$keyword'");
        return $this->fetchAll(); 
    }

    public function searchEmail($email){
       
        return  $this->select($this->table,"email='".$email."'") ? True : false;
    }

    public function checkUser($email, $password)
    {
         $this->select($this->table,"email='".$email."'");
    
        $user = $this->fetch();  // Fetch a single row
    
    
        if ($user && password_verify($password, $user['password'])) {
            return $user['id'];
        }
    
        return false;
    }

    public function checkPassword($id,$password){
        $this->select($this->table,'id='.$id);
        $user = $this->fetch();
       return password_verify($password, $user['password'])? True : false;
    }

    public function checkLevel($id){
        $row=$this->getUser($id);
         return $row['superAdmain']? true:false;

    }
    






}

?>
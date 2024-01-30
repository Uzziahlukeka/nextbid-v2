<?php
class Database{
    private $host='localhost';
    private $db_name='log';
    private $db_port=3307;
    private $username='class4';
    private $password='Qwerty123';
    private $conn;


//DB connect 
public function connect(){
    $this->conn=null;

        try{
            $this->conn=new PDO('mysql:host='.$this->host.';port='.$this->db_port.';dbname='.$this->db_name.'',$this->username,$this->password);
            //set attributes for showing errors  
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e){
            echo'connection error : '.$e->getMessage();
        }
        
        return $this->conn;
    }
}
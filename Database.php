<?php

class db{
    protected $connection;

    function setconnection(){
        try{
            $this->connection=new PDO("mysql:host=localhost; dbname=cis2104_finalproject_db", "root", "");
            //echo "Done";
        } catch(PDOException $e){
            echo "Error";
            //die();
        }
    }
}
?>
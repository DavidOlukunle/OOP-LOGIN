<?php

class Dbh{
    protected function connect(){
        try{
            $username="David";
            $password="password";
            $dbh=new PDO('mysql:host=localhost;dbname=loginoop',$username,$password);
            return $dbh;

        }catch(PDOException  $e){
            print "Error:".$e->getMessage()."<br/>";
            die();


        }
    }
}
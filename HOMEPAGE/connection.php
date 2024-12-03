<?php
    class DatabaseConnection{
        protected function connection(){
            try{
                $username = "root";
                $password = "";
                $dbh = new PDO("mysql:host=localhost;dbname=tutoring", $username, $password);
                return $dbh;
            }
            catch(PDOException $error){
                print "Error!:" . $error->getMessage() . "<br/>";
                die();
            }
        }
    }
       
?>
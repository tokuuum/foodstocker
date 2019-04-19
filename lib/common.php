<?php
function get_conn(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=food_stocker;port=3306;charset=utf8;","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}
?>
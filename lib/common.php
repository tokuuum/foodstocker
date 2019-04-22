<?php
// DB接続
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

// モード判定
function get_mode(){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        return isset($_GET['mode']) ? $_GET['mode'] : "";
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        return isset($_POST['mode']) ? $_POST['mode'] : "";
    }else{
        return null;
    }
}

// リダイレクト
function redirect($path){
    header("Location: " . $path);
}
?>
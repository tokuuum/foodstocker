<?php
include ('common.php');
$pdo = get_conn();

$term = strip_tags(substr($_POST['search_term'],0, 100));
$sql = $pdo->prepare("SELECT stock FROM foods where name = :term");
$sql->bindParam(':term', $term);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
$string = array();

if (count($result) > 0) {
    foreach($result as $row){
        $string[] = $row['stock'];
    };
}
header("Content-Type: application/json; charset=utf-8");
echo json_encode($string);
?>
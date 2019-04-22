<?php
include ('common.php');
$pdo = get_conn();

$term = strip_tags(substr($_POST['search_term'],0, 100));
$term = '%'.$term.'%';
$sql = $pdo->prepare("SELECT name FROM foods where name like :term order by name asc");
$sql->bindParam(':term', $term);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$string = array();

if (count($result) > 0) {
    foreach($result as $row){
        $string[] = $row['name'];
    };
}

// 完全一致
// $words = array();
// foreach($string as $word){
//   if(mb_stripos($word, $term) !== FALSE){
//     $words[] = $word;
//   }
// }


header("Content-Type: application/json; charset=utf-8");
echo json_encode($string);
?>
<?php
// define(HOST, "xxx");
// define(USER, "xxx");
// define(PW, "xxx");
// define(DB, "xxx");

// $connect = mysqli_connect(HOST,USER,PW) or die('Could not connect to mysql server.' );
// mysqli_select_db($connect,DB) or die('Could not select database.');
// mysqli_set_charset($connect, "utf8");

include ('lib/common.php');
$pdo = get_conn();
echo $_POST['search_term']."POST成功";
$term = strip_tags(substr($_POST['search_term'],0, 100));
$term = mysqli_real_escape_string($pdo,$term);

$sql = $pdo->prepare("SELECT name FROM foods where name like :term order by name asc");
//$result = mysqli_query($pdo,$sql);
$sql->bindParam(':term', $term);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


echo count($result)."あああ";
if (count($result) > 0) {
    foreach($result as $row){
        $string[] = $row['name'];
    };
}

// if(mysqli_num_rows($result) > 0){
//   while($row = mysqli_fetch_assoc($result)){
//     $string[] = $row['member_name'];
//   }
// }

$words = array();
foreach($string as $word){
  if(mb_stripos($word, $term) !== FALSE){
    $words[] = $word;
  }
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($words);
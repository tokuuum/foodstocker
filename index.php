<?php
include ('./lib/common.php');

$pdo = get_conn();

// 買い物リスト検索
$stmt = $pdo->prepare("select name from foods where shopping_list = 1");
$stmt->execute();
$shopping_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$search_words = "けんさくわーど";
$search_num = 100;
$reg_num = 0;
include ('./lib/index.php');

?>
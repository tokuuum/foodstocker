<?php
include ('./lib/common.php');

$pdo = get_conn();
$today = date("Y-m-d");
$one_week = date("Y-m-d", strtotime("7 day"));

// 買い物リスト検索
$stmt = $pdo->prepare("select name from foods where shopping_list = 1");
$stmt->execute();
$shopping_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 賞味期限間近(1週間以内)
$stmt = $pdo->prepare("select name from foods where limit_date > :today && limit_date < :one_week");
$stmt->bindValue(':today', $today);
$stmt->bindValue(':one_week', $one_week);
$stmt->execute();
$near_food = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 賞味期限切れ検索
$stmt = $pdo->prepare("select name from foods where limit_date < :today");
$stmt->bindValue(':today', $today);
$stmt->execute();
$bad_food = $stmt->fetchAll(PDO::FETCH_ASSOC);

$search_words = "けんさくわあど";
$search_num = 100;
$reg_num = 0;

include ('./lib/index.php');

?>
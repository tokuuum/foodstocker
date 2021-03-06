<?php
include ('./lib/common.php');
$mode = get_mode();
echo "MODE:".$mode.";";
session_start();

if ($mode == "add") {
    $f_name = isset($_POST['reg_food']) ? $_POST['reg_food'] : "";
    $f_num = isset($_POST['reg_num']) ? $_POST['reg_num'] : "";
    $f_days = isset($_POST['reg_limit']) ? $_POST['reg_limit'] : "";
    $f_year = isset($_POST['reg_year']) ? $_POST['reg_year'] : "";
    $f_month = isset($_POST['reg_month']) ? $_POST['reg_month'] : "";
    $f_day = isset($_POST['reg_day']) ? $_POST['reg_day'] : "";
    $f_limit_date = $f_year.$f_month.$f_day;
    $limited = isset($_POST['limited']) ? $_POST['limited'] : "";

// 入力チェック
    $error = array();

    if (!$f_name) {
        $error['f_name'] = "食材名は必須です";
    }
    if (!$f_num) {
        $error['f_num'] = "個数は必須です";
    }

    if ($error) {
        //エラーがある場合
        //入力画面に戻ってエラーメッセージを表示
        include ("./lib/add.php");
    }
    else {
        //エラーが無い場合
        //DB登録して一覧へ遷移する
        $now_dt = date("Y-m-d H:i:s");
        $pdo = get_conn();

        //登録済みか確認
        $stmt = $pdo ->prepare("select count(*) from foods where name =:name");
        $stmt->bindValue(':name', $f_name);
        $stmt->execute();
        $check = $stmt->rowCount();
        if ($check > 0) {
            // 更新
            $stmt = $pdo->prepare("update foods set stock = :stock, limit_date = :limit_date, about_flag = :about_flug, shopping_list = :shopping_list, update_dt = :update_dt where name = :name");
            $stmt->bindValue(':name', $f_name);
            $stmt->bindValue(':stock', $f_num);
            if ($limited == 1) {
                // あと何日くらい
                $f_days = date("Y-m-d H:i:s", strtotime($f_days."day"));
                $stmt->bindValue(':about_flug', 1);
                $stmt->bindValue(':limit_date', $f_days);
            }
            else if ($limited == 2) {
                // 何日まで
                $stmt->bindValue(':about_flug', 0);
                $stmt->bindValue(':limit_date', $f_limit_date);
            }
            else {
                $stmt->bindValue(':about_flug', 1);
                $stmt->bindValue(':limit_date', null);
            }
            $stmt->bindValue(':shopping_list', 0);
            $stmt->bindValue(':update_dt', $now_dt);
            $stmt->execute();

        }else{
            // 登録
            $stmt = $pdo->prepare("insert into foods(name, stock, limit_date, about_flag, shopping_list, create_dt, update_dt)
                    values(:f_name, :f_num, :limit_date, :about_flag, :shopping_list, :dt, :dt)");
            $stmt->bindValue(':f_name', $f_name);
            $stmt->bindValue(':f_num', $f_num);
            if ($limited == 1) {
                // あと何日くらい
                $f_days = date("Y-m-d H:i:s", strtotime($f_days."day"));
                $stmt->bindValue(':about_flag', 1);
                $stmt->bindValue(':limit_date', $f_days);
            }
            else if ($limited == 2) {
                // 何日まで
                $stmt->bindValue(':about_flag', 0);
                $stmt->bindValue(':limit_date', $f_limit_date);
            }
            else {
                $stmt->bindValue(':about_flag', 1);
                $stmt->bindValue(':limit_date', null);
            }
            $stmt->bindValue(':shopping_list', 0);
            $stmt->bindValue(':dt', $now_dt);
            $stmt->execute();

        }

        $_SESSION['comp_txt']= $f_name."の在庫を".$f_num."つで登録しました！";
        $_SESSION['f_name'] = $f_name;
        redirect('add.php');
    }
}
else if($mode == "add_list"){
    $add_name = isset($_POST['add_name']) ? $_POST['add_name'] : "";
    $_SESSION['add_list'] = $add_name;

    $pdo = get_conn();
    $stmt = $pdo->prepare("update foods set shopping_list=1 where name = :name");
    $stmt->bindValue(':name', $add_name);
    $stmt->execute();

    redirect('add.php');
} else {
    $f_name = "";
    $f_num = "";
    $f_days = "";
    $f_year = "";
    $f_month = "";
    $f_day = "";
    if(isset($_SESSION['comp_txt']) == false) {
        echo "初期表示";
    }
    else{
        // 必要
        session_destroy();
    }
    include ('./lib/add.php');
}
?>
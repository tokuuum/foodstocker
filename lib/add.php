<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>food_stocker</title>
<link href="./css/normalize.css" rel="stylesheet">
<link href="./css/common.css" rel="stylesheet">
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/index.js"></script>
</head>
<body>
	<h1>在庫登録</h1>
	<form method="post" action="add.php">
		<input type="hidden" name="mode" value="add">
		<table class="table table-hover">
		<tbody>
			<tr class="table-warning">
				<th>食材名</th>
			</tr>
			<tr>
				<td>
					<p style="color: red"><?php echo @$error['f_name'] ?></p>
					<!--<input type="text" name="reg_food" size="20" value="<?php echo $f_name ?>"> -->
					<input type="text" name="reg_food" class="form-control" id="search_term" size="20" value="<?php echo $f_name ?>" />
				</td>
			</tr>
			<tr class="table-warning">
				<th>個数</th>
			</tr>
			<tr>
				<td>
					<p style="color: red"><?php echo @$error['f_num'] ?></p>
					<input type="text" name="reg_num" class="form-control" size="3" value="<?php echo $f_num ?>"><span>つ</span>
				</td>
			</tr>
			<tr class="table-warning">
				<th>賞味期限</th>
			</tr>
			<tr>
				<td>
				<div class="form-group">
    				<div class="custom-control custom-radio">
    				<input type="radio" id="customRadio1" name="limited" class="custom-control-input" value="0" checked="checked">
          			<label class="custom-control-label" for="customRadio1">なし</label>
        			</div>
        			<div class="custom-control custom-radio">
        			<input type="radio" id="customRadio2" name="limited" class="custom-control-input" value="1">
          			<label class="custom-control-label" for="customRadio2">
          			<span>あと <input type="text" name="reg_limit" class="form-control" value="<?php echo $f_days ?>" size="3">日くらい</span>
          			</label>
        			</div>
        			<div class="custom-control custom-radio">
    				<input type="radio" id="customRadio3" name="limited" class="custom-control-input" value="2">
          			<label class="custom-control-label" for="customRadio3">
          			<span>
            				<input type="text" name="reg_year" class="form-control" value="<?php echo $f_year ?>" size="4">年
            				<input type="text" name="reg_month" class="form-control" value="<?php echo $f_month ?> "size="2">月
            				<input type="text" name="reg_day" class="form-control" value="<?php echo $f_day ?>" size="2">日まで
        				</span>
        			</label>
        			</div>
    			</div>
				</td>
			</tr>
		</tbody>
		</table>
		<input type="submit" class="btn btn-primary" value="追加">
	</form>
	<?php
    if (isset($_SESSION['comp_txt'])) {
        print("<p>" . $_SESSION['comp_txt'] . "</p>
    <form method='post' action='add.php'>
    <input type='hidden' name='mode' value='add_list'>
    <input type='hidden' name='add_name' value='".$_SESSION['f_name']."'>
    <input type='submit' value='買い物リストに追加'></form>");
        // 正常終了したらセッションを終了する
        // session_destroy();
    }
    if (isset($_SESSION['add_list'])) {
        print("<tr><td><p>" . $_SESSION['add_list'] . "を買い物リストに追加しました</p></td></tr>");
        // 正常終了したらセッションを終了する
        // session_destroy();
    }
    ?>
    <p><a class="btn btn-primary" href="../">戻る</a></p>
</body>
</html>
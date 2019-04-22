<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>food_stocker</title>
</head>
<script type="text/javascript">
var js_test = <?php echo $complete; ?>
alert(js_test);
</script>
<body>
	<h1>在庫登録</h1>
    <form method="post" action="add.php">
    	<input type="hidden" name="mode" value="add">
		<table border="1">
			<tr>
				<th>食材名</th>
			</tr>
			<tr>
				<td>
				<p style="color:red"><?php echo @$error['f_name'] ?></p>
				<input type="text" name="reg_food" size="20" value="<?php echo $f_name ?>"></td>
			</tr>
			<tr>
				<th>個数</th>
			</tr>
			<tr>
				<td>
				<p style="color:red"><?php echo @$error['f_num'] ?></p>
				<input type="text" name="reg_num" size="3" value="<?php echo $f_num ?>"><span>つ</span></td>
			</tr>
			<tr>
				<th>賞味期限</th>
			</tr>
			<tr>
				<td>
				<input type="radio" name="limited" value="0">なし<br>
				<input type="radio" name="limited" value="1" checked="checked">
					<span>あと
					<input type="text" name="reg_limit" value="<?php echo $f_days ?>" size="3">日くらい</span>
					<br>
					<input type="radio" name="limited" value="2">
					<span>
					<input type="text" name="reg_year" value="<?php echo $f_year ?>" size="4">年
					<input type="text" name="reg_month" value="<?php echo $f_month ?>" size="2">月
					<input type="text" name="reg_day" value="<?php echo $f_day ?>" size="2">日まで</span>
					<br>
					</td>
			</tr>
			<tr>
				<td>
					<p></p>
					<p>買い物リストに追加</p>
				</td>
			</tr>
		</table>
		<input type="submit" value="追加">
	</form>
</body>
</html>
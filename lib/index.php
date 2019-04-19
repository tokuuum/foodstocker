<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>food_stocker</title>
</head>
<body>
	<h1>food_stocker</h1>
	<!--<div>
		<ul>
			<li>りんご</li>
			<li>バター</li>
		</ul>
		<p>の賞味期限が近づいています！</p>
	</div>
	<div>
		<ul>
			<li>ガーリックパウダー</li>
		</ul>
		<p>の賞味期限が切れています！</p>
	</div>
    -->
	<p>買い物リスト</p>
	<?php
	if (count($shopping_datas) != 0) {
	    echo '<ul>';
	    foreach($shopping_datas as $row){
    	    echo '<li>'.$row['name'].'</li>';
    	}
    	echo '</ul>';
	}
	?>

	<p>検索</p>
	<input type="text" name="search" size="20" value="<?php echo $search_words ?>">
	<p><?php echo $search_num ?>つあります</p>

	<p>在庫登録</p>
	<form method="post" action="index.php">
		<p>
			<input type="text" name="reg_food" size="20">
		</p>
		<p>
			<input type="text" name="reg_num" size="3"><span>つ</span>
		</p>
		<!--<p>賞味期限</p>
		<p>
			あと<input type="text" name="reg_limit" size="3">日くらい
		</p>
		<p>
			<input type="text" name="reg_year" size="4">年
			<input type="text" name="reg_month" size="2">月
			<input type="text" name="reg_day" size="2">日まで
		</p>
		 -->
		<button type="submit">登録</button>
		<p>キムチの在庫を<?php echo $reg_num?>つで登録しました！</p>
		<button>買い物リストに追加</button>
	</form>
</body>
</html>
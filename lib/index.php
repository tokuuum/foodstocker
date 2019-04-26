<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>food_stocker</title>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="./js/index.js"></script>
</head>
<body>
	<h1>food_stocker</h1>
	<?php
	if (count($bad_food) != 0) {
	    echo '<div><ul>';
	    foreach ($bad_food as $row){
	        echo '<li>'.$row['name'].'</li>';
	    }
	    echo '</ul>';
	    echo '<p>の賞味期限が切れています！</p>';
	    echo '</div>';
	}
    ?>
    <?php
    if (count($near_food) != 0) {
	    echo '<div><ul>';
	    foreach ($near_food as $row){
	        echo '<li>'.$row['name'].'</li>';
	    }
	    echo '</ul>';
	    echo '<p>の賞味期限が近づいています！</p>';
	    echo '</div>';
	}
    ?>
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
	<form id="searchform" method="post">
		<div>
			<input type="text" name="search_term" id="search_term" />
		</div>
		<div id="check_num">在庫確認</div>
	</form>
	<p id="stock_num"></p>

	<p><a href="add.php">在庫登録</a></p>

</body>
</html>
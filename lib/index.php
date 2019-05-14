<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<h1>foods stocker</h1>
	<?php
	if (count($bad_food) != 0) {
	    echo '<div class="card text-white bg-danger mb-3">';
	    echo '<div class="card-header">賞味期限が切れています！</div>';
	    echo '<div class="card-body">';
	    echo '<ul>';
	    foreach ($bad_food as $row){
	        echo '<li>'.$row['name'].'</li>';
	    }
	    echo '</ul>';
	    echo '</div></div>';
	}
    ?>
    <?php
    if (count($near_food) != 0) {
        echo '<div class="card text-white bg-warning mb-3">';
        echo '<div class="card-header">賞味期限が近づいています！</div>';
        echo '<div class="card-body">';
        echo '<ul>';
	    foreach ($near_food as $row){
	        echo '<li>'.$row['name'].'</li>';
	    }
	    echo '</ul>';
	    echo '</div></div>';
	}
    ?>
    <div class="card mb-3">
	<h3 class="card-header">買い物リスト</h3>
	<?php
	if (count($shopping_datas) != 0) {
	    echo '<ul class="list-group list-group-flush">';
	    foreach($shopping_datas as $row){
    	    echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.$row['name'].'<a class="badge badge-primary badge" href="">buy</a></li>';
    	}
    	echo '</ul>';
	}
	?>
	</div>
<div class="card mb-3">
    <h3 class="card-header">検索</h3>
    <div class="card-body">
	<form class="form-inline my-2 my-lg-0" id="searchform" method="post">
		<input type="text" name="search_term" class="form-control mr-sm-2" id="search_term" />
		<div class="btn btn-secondary my-2 my-sm-0" id="check_num" href="">在庫確認</div>
	</form>
	<p id="stock_num"></p>
	</div>
</div>

	<p><a href="add.php" class="btn btn-primary btn-lg btn-block">在庫登録</a></p>

</body>
</html>
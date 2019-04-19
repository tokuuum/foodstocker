<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome!</title>
<link rel="stylesheet"
	href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>

	<h1>Search Autocomplete</h1>
	<form id="searchform" method="post">
		<div>
			<label for="search_term">Search name</label> <input type="text"
				name="search_term" id="search_term" />
		</div>
	</form>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type='text/javascript'>

$(document).ready(function(){
  $("#search_term").keyup(function(e){
    e.preventDefault();
    var search_val = $("#search_term").val();

    $.post("autocomplete.php", {search_term : search_val})
    .done( function(data){
		alert('できた');
    })
	.fail( function() {
		alert('error');
	})
	.always ( function() {
		alert('おわり');
	});
});

//     $.post("autocomplete.php", {search_term : search_val}, function(data){
//     	alert(search_val);
//       if(data.length>0){
//         $("#search_term").autocomplete({
//           source: data
//         });
//       }
//     })
//  });
});
</script>
</body>
</html>

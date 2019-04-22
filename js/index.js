$(document).ready(function() {
	//
	// オートコンプリート
	//
	$("#search_term").keyup(function(e) {
		e.preventDefault();
		var search_val = $("#search_term").val();
		$.post("lib/autocomplete.php", {
			search_term : search_val
		}).done(function(data) {
			if (data.length > 0) {
				$("#search_term").autocomplete({
					source : data
				});
			}
		}).fail(function() {
			alert('オートコンプリートerror');
		}).always(function() {
		});
	});

	$("#check_num").click( function(){
		var search_val = $("#search_term").val();
		$.post("./lib/stock.php", {
			search_term : search_val
			}).done(function(data) {
			$('#stock_num').text(data + "つあります");
			}).fail(function() {
				alert('在庫数error');
			}).always(function() {
		});
	});
});
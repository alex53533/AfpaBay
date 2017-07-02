<!DOCTYPE html>
<html>
<head>
	<title>Genre du film</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
<style type="text/css">
select{
	width:250px;
	border-radius:3px;
}
</style>
<script src="jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{		
	function getAll(){
		$.ajax
		({
			url: 'products_Film.php',
			data: 'action=showAll',
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			}
		});			
	}
	getAll();
	$("#products_Film").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
				
		$.ajax
		({
			url: 'products_Film.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			} 
		});
	})
});
</script>
</head>
<body>
<div class="container col-xs-12">
<div class="page-header input-group col-xs-5 col-xs-offset-9">
	<h5>
		<select id="products_Film">
		<option value="" selected="selected">Genre du film</option>
		<?php
		require_once 'config.php';
		
		$result = $dbcon->prepare('SELECT * FROM genre_film');
		$result->execute();
		
		while($donnees=$result->fetch(PDO::FETCH_ASSOC))
		{
		extract($donnees);
		?>
		<option value="<?php echo $ID_genre; ?>"><?php echo $Genre; ?></option>
		<?php
		}
		?>
		</select>
	</h5>
</div>
<div class="" id="display"></div>
</div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compose Message</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="select2-master/select2.css">
	<link rel="stylesheet" href="select2-master/select2-bootstrap.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="select2-master/select2.js"></script>
	<script type="text/javascript" src="select2-master/select2_locale_en.js"></script>
	<script type="text/javascript">
	function loadedFriends(e)
	{
		e=JSON.parse(e)
		length=e.length;
		var data='<select name="friends[]" multiple class="span7" style="margin-bottom:20px;" id="friend_list">';
		for (var i = 0; i < e.length; i++) {
			data=data+'<option value='+e[i].id+'>'+(e[i].name)+'</option>';
		};
		data=data+"</select>";
			return data;
	}
		$(document).ready(function(){
			$("#loading-state").show('slow');
			a=$.get('getfriendlist.php','',function(data){
				$('#loading-state').html(loadedFriends(data));
				$('#friend_list').select2();
			})
		});
	</script>
</head>
<body>
	<form action='send.php' method="POST">
	<div class="hero-unit">
	
		<?php
	if(isset($_GET['action']))
	{
		if($_GET['action']==success)
		{
		?>
	<div class='alert alert-success'>Your message has been sent sucessfully</div>		
		<?php		
		}
	}
	?>

	Select your friends
		<div id="loading-state" class="hide small">
			<small>Please wait while we populate your friendlist from Facebook. Load time depends on the speed of your internet connection and the number of friends on your facebook account. You can compose message till then</small>
			<img src="images/loading.gif" alt="loading...">
		</div>
		<textarea class="span7" rows=10 name="message" onClick='this.select()' id="">Hi there, this message is sent from an application which is developed using facebook chat api. This is the default message in there.</textarea>
		<br />
		<input type="submit" class='btn btn-primary' name='submit' value="Send Message!">

	</div>
	</form>
</body>
</html>
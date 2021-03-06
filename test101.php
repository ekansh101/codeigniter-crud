<?php

	$mysqli = new mysqli("localhost","root","","test101");

// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div id="show"></div>
<h2>MyForm</h2>

<form name="form">
  <label for="fname" >First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br>
  <label for="email">Email:</label><br>
  <input type="email" name="email" id="email" name="email" value="John@gmail.com"><br><br>
  <button type="button" name="submit"  name="submit" class="submit" id="submit" onclick="insert()">Insert</button>
</form>

</body>
<script type="text/javascript">
	function readrecord(){
    	var check = 'check';
		var url = 'test104.php';
	     $.ajax({
	     type: "POST",
           url: url,
           data: {check:check},
	     	 success: function(data)
           {
           	 $('#show').html(data);
           }
	     });

	}
	function insert(){
		var name= $('#fname').val()+' '+$('#lname').val();
		var email = $('#email').val(); 
		var url = 'test104.php';
	     $.ajax({
	     type: "POST",
           url: url,
           data: {name:name,email:email},
	     	 success: function(data)
           {
               readrecord(); // show response from the php script.
           }
	     });

	}
</script>
</html>
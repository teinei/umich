<?php
session_start();
?>
<html>
<head></head>
<body>
<h1>cool application</h1>
<?php 
	if(isset($_SESSION["success"])){
		echo('<p stype="color:green"'.$_SESSION['success']."<\p>\n");
		unset($_SESSION["success"]);
	}
	
	if(!isset($_SESSION["account"])){ ?>
		<p>please<a href="login.php">log in</a> to start.</p>
<?php }else{ ?>
	<p>this is where a cool application would be.</p>
	<p>please <a href="logout.php">log out</a>when you are done.</p>
<?php } ?>
</body>
</html>
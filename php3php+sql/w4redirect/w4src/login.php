<?php
	session_start();
	if(isset($_POST["account"])&&isset($_POST["pw"])){
		unset($_SESSION["account"]);
		if($_POST['pw']=='123'){
			$_SESSION["account"] = $_POST["account"];
			//mistype = to ==
			$_SESSION["success"] = "logged in.";
			//typo = as ==
			header('Location: app.php');
			return;//terminate?
		}else{
			$_SESSION["error"]="incorrect password";
			header("location: login.php");
			return;
		}
	}
?>
<html>
<head></head>
<body>
<h1>please log in</h1>
<?php 
	if(isset($_SESSION["error"])){
		echo('<p style="color:red"'.$_SESSION["error"]."</p>\n");
		unset($_SESSION["error"]);
	}
?>
<form method="post">
<p>account: <input type="text" name="account" value=""></p>
<p>password: <input type="text" name="pw" value=""></p>
<p><input type="submit" value="Log in">
<a href="app.php">cancel</a></p>
</form>
</body>
</html>
<?php
	require_once "pdo.php";
	session_start();
	echo "<h1>test</h1>";
	//echo "isset($_POST["account"])";
	$bool=isset($_POST["account"])&&isset($_POST["pw"]);
	echo "<p>".'$_POST[\'account\']<<<: '.$_POST['account']."</p>";
	echo "<p>".'$_POST[\'pw\']<<<: '.$_POST['pw']."</p>";
	echo "$bool";
	if($bool===TRUE) echo "bool is 3= true";
	//
	//
	if(isset($_POST["account"])&&isset($_POST["pw"])){
		unset($_SESSION["account"]);
		//
		//echo("<p>Handling POST data...</p>\n");

    	$sql = "SELECT name FROM teachers
        WHERE name = :em AND password = :pw";

    	echo "<p>".'$sql <<< : ' ."$sql</p>\n";

    	$stmt = $pdo->prepare($sql);
    	$stmt->execute(array(
        ':em' => $_POST['account'],
        ':pw' => $_POST['pw']));
    	
    	echo "<p>".'$stmt <<< : ';
    	var_dump($stmt);
    	echo "<br>";
    	
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	/*
    	 * row has two possible VALUES: 
    	 * array
    	 * OR
    	 * (bool)false
    	 * 
    	 */
    	echo "<p>".'$row <<< : ';
    	echo "<br>";
    	var_dump($row);

    	echo "<br>";
		//
		if($row!=FALSE){
			echo '<p style="color:green">'."login success</p>";
			$_SESSION["account"] = $_POST["account"];
			//mistype = to ==
			$_SESSION["success"] = "logged in.";
			//typo = as ==
			
			header('Location: app.php');
			//header('Location: http://www.google.com');
			return;//terminate?
		}else if($row===FALSE) {	//	}
			echo '<p style="color:red">'."login failed";
			$_SESSION["error"]="incorrect user namer or password";
			
			header("location: login.php");
			return;
		}else{
			echo "what the hell";
		}
	}
?>
<html>
<head></head>
<body>
<h1>please log in</h1>
<?php
	if(isset($_SESSION["error"])){
		echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
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
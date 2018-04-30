<?php
require_once 'pdo.php';

if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password']) ){
	$sql="INSERT INTO users(name,email,password) VALUES (:name,:email,:password)";
	echo ("<pre>\n".$sql."\n</pre>\n");
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(
			':name'=>$_POST['name'],
			':email'=>$_POST['email'],
			':password'=>$_POST['password']
	));
}

if(isset($_POST['delete'])&&isset($_POST['user_id'])){
	$sql="DELETE FROM users WHERE user_id=:zip";//colon zip is place holder
	echo "<pre>\n$sql\n</pre>\n";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(':zip'=>$_POST['user_id']));//mapping zip to post field
}
?>
<html>
<head></head>
<body>
<table border='1'>
<?php 
$stmt=$pdo->query('SELECT name, email, password,user_id FROM users');
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
	<tr><td>
	<?php echo($row['name']);?>
	</td><td>
	<?php echo($row['email']); ?>
	</td><td>
	<?php echo($row['password'])?>
	</td><td>
	<form method="post"><input type="hidden" 
	
	name="user_id" value=" <?php $row['user_id'] ?> " >
	<input type="submit" value="del" name="delete">
	</form>
	</td></tr>
	<?php 
}?>

<?php	/*
	echo"<tr><td>";
	echo($row['name']);
	echo"</td><td>";
	echo($row['email']);
	echo("</td><td>");
	echo($row['password']);
	echo("</td><td>");
	echo('<form method="post"><input type="hidden" ');
	//put a form, little miniture form, user_id as a hidden/hid3n/ value
	echo('name="user_id" value="'.$row['user_id'].'">'."\n");
	//concatenate <<'name="user_id" value="'>> + .<<$row['user_id']>>. + .'">'.  + "\n"
	echo('<input type="submit" value="del" name="delete">');
	echo("\n</form>\n");
	echo("</td></tr>\n");
	 */
//}
?>
</table>

<p>add a new user</p>
<form method="post">
<p>name:<input type="text" name="name" size="40"></p>
<p>email:<input type="text" name="email"></p>
<p>password:<input type="password" name="password"></p>
<p><input type="submit" value="add new"/></p>
</form>
</body>
</html>

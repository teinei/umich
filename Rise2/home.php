<?php
require_once 'pdo.php';
//session_start();
?>
<html>
<head></head>
<body>
<?php
if(isset($_SESSION['error'])){
?>	<p style="color:red"><?= $_SESSION['error'] ?></p>
<?php
	unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
?>	<p style="color:green"><?= $_SESSION['success'] ?></p>
<?php
	unset($_SESSION['success']);
}
?>

<table border="1">
<?php //print a table out
$stmt = $pdo->query("SELECT name,email,password, user_id FROM teachers");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>


<tr><td>
<?= htmlentities($row['name']) ?>
</td><td>
<?= htmlentities($row['email']) ?>
</td><td>
<?= htmlentities($row['password']) ?>
</td><td>
<?php
/* <a href="edit.php?user_id="<?= $row['user_id']?>"">Edit</a>  */
echo('<a href="edit.php?user_id='.$row['user_id'].'">Edit</a> /');
/*<a href="delete.php?user_id='<?php $row['user_id'] ?>'">Delete</a>*/
echo('<a href="delete.php?user_id='.$row['user_id'].'">Delete</a>');
?>
</td></tr>
<?php
} // I forget to close while loop.
?>

</table>
<a href="add.php">Add New</a>

</body>
</html>

<?php
require_once "pdo.php";
session_start();

if(isset($_POST['name'])&&isset($_POST['email'])
&& isset($_POST['password'])&&isset($_POST['user_id'])){
    $sql="UPDATE users SET name=:name,email=:email,password=:password
    WHERE user_id=:user_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':name'=>$_POST['name'],
        ':email'=>$_POST['email'],
        ':password'=>$_POST['password'],
        ':user_id'=>$_POST['user_id']
    ));
    $_SESSION['success']='Record updated';
    header('Location: index.php');
    return;
}

$stmt=$pdo->prepare("SELECT * FROM teachers WHERE user_id=:xyz");
$stmt->execute(array(":xyz"=>$_GET['user_id']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($row===false){
    $_SESSION['error']="Bad value for user_id";
    header('Location: index.php');
    return;
}

$n=htmlentities($row['name']);
$e=htmlentities($row['email']);
$p=htmlentities($row['password']);
$user_id=$row['user_id'];
?>
<p>edit users</p>
<form method="post">
    <p>name: <input type="text" name="name" value="<?= $n ?>"></p>
    <p>email: <input type="text" name="email" value="<?= $e ?>"></p>
    <p>password: <input type="password" value="<?= $p ?>"></p>
    <input type="hidden" name="user_id" value="<?= $user_id ?>">
    <a href="app.php">cancel</a></p>
</form>

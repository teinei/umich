<?php
if(!isset($_COOKIE['zap'])){
	setcookie('zap','42',time()+3600);//plus 3600 seconds
}
?>
<pre>
<?php 
print_r($_COOKIE);
?>
</pre>
<p><a href="cookie_sess.php">Click Me</a> or press refresh</p>
//that's cookie part

<?php 
session_start();
if(!isset($_SESSION['pizza'])){
	echo("<p>session is empty</p>\n");
	$_SESSION['pizza']=0;
}else if($_SESSION['pizza']<3){
	$_SESSION['pizza']=$_SESSION['pizza']+1;
	echo("<p>added one...</p>\n");
}else{
	session_destroy();
	session_start();
	echo("<p>session restarted</p>\n");
}
?>
<p><a href="">click me</a></p>
<p>our session ID is: <?php echo(session_id());?></p>
<pre>
<?php print_r($_SESSION);?>
</pre>
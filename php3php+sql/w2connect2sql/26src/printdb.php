<?php
//thrird.php in demo
echo "<pre>\n";
require_once 'pdo.php';
$stmt = $pdo->query("SELECT * FROM users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	print_r($row);//print() will make an error message
}
echo "</pre>\n";
?>
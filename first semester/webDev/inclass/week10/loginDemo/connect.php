<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=168DB_2;charset=utf8", "168DB2", "2be6G243");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>
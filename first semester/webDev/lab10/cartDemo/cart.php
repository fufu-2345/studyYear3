<?php

include "connect.php";
session_start();

// เพิ่มสินค้า
if ($_GET["action"]=="add") {
	session_start();
	$pid = $_GET['pid'];
	$stmt = $pdo->prepare("SELECT * FROM product where pid= ?");
	$stmt->bindParam(1, $_GET["pid"]);  
	$stmt->execute();
	$row = $stmt->fetch();
	if($_POST['qty']<=$row['quantity']){
		$cart_item = array(
			'pid' => $pid,
			'pname' => $_GET['pname'],
			'price' => $_GET['price'],
			'qty' => $_POST['qty']
		);
	} 

	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if(empty($_SESSION['cart']))
    	$_SESSION['cart'] = array();
 
	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if(array_key_exists($pid, $_SESSION['cart'])){
		session_start();
		$stmt = $pdo->prepare("SELECT * FROM product where pid= ?");
		$stmt->bindParam(1, $_GET["pid"]);  
		$stmt->execute();
		$row = $stmt->fetch();
		if($_SESSION['cart'][$pid]['qty'] + $_POST['qty']<=$row['quantity']){
			$_SESSION['cart'][$pid]['qty'] += $_POST['qty'];
		}
	}
		
	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
	    $_SESSION['cart'][$pid] = $cart_item;

// ปรับปรุงจำนวนสินค้า
} else if ($_GET["action"]=="update") {
	$pid = $_GET["pid"];     
	$qty = $_GET["qty"];
	$stmt = $pdo->prepare("SELECT * FROM product where pid= ?");
	$stmt->bindParam(1, $_GET["pid"]);  
	$stmt->execute();
	$row = $stmt->fetch();
	if($qty<=$row['quantity']){
		$_SESSION['cart'][$pid]['qty'] = $qty;
	}

// ลบสินค้า
} else if ($_GET["action"]=="delete") {
	$pid = $_GET['pid'];
	unset($_SESSION['cart'][$pid]);
}

if ($_GET["action"]=="confirmed") {
	$stmt = $pdo->prepare("SELECT count(*) from orders");
	$stmt->execute();
	$row = $stmt->fetch();
	$orderId=$row['count(*)']+1;

	$stmt = $pdo->prepare("INSERT INTO orders (username, ord_date, status) VALUES (?, NOW(), 'wait');");
	$stmt->bindParam(1, $_SESSION["username"]);  
	$stmt->execute();

	foreach ($_SESSION['cart'] as $item) {
        $stmt = $pdo->prepare("INSERT INTO item (ord_id, pid, quantity) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $orderId);
        $stmt->bindParam(2, $item['pid']);
        $stmt->bindParam(3, $item['qty']);
        $stmt->execute();
    }
	$_SESSION['cart'] = array();
}
?>

<html>
<head>
<script>
	// ใช้สำหรับปรับปรุงจำนวนสินค้า
	function update(pid) {
		var qty = document.getElementById(pid).value;
		// ส่งรหัสสินค้า และจำนวนไปปรับปรุงใน session
		document.location = "cart.php?action=update&pid=" + pid + "&qty=" + qty; 
	}
</script>
</head>
<body>
	<form>
		<table border="1">
			<?php 
				$sum = 0;
				foreach ($_SESSION["cart"] as $item) {
					$sum += $item["price"] * $item["qty"];
			?>
			<tr>
				<td><?=$item["pname"]?></td>
				<td><?=$item["price"]?></td>
				<td>
					<?php
					$stmt = $pdo->prepare("SELECT * FROM product where pname= ?");
					$stmt->bindParam(1, $item["pname"]);  
					$stmt->execute();
					$row = $stmt->fetch();
					?>		
					<input type="number" id="<?=$item["pid"]?>" value="<?=$item["qty"]?>" min="1" max="<?=$row["quantity"]?>">
					<a href="#" onclick='update(<?=$item["pid"]?>)'>แก้ไข</a>
					<a href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
				</td>
			</tr>
			<?php } ?>
			<tr><td colspan="3" alignt="right">รวม <?=$sum?> บาท</td></tr>
		</table>
	</form>
	<a href="?action=confirmed">ยืนยันคำสั่งซื้อ</a>
	<br/><br/>
	<a href="index2.php">< เลือกสินค้าต่อ</a>
</body>
</html>
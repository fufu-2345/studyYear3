<?php 
    include "connect.php";
    session_start();
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->execute();
    $row = $stmt->fetch();

    if (!empty($row)) {
        session_regenerate_id();
        $_SESSION["fullname"] = $row["name"];
        $_SESSION["username"] = $row["username"];
        if($_SESSION["username"] != "somsak"){
            $stmt = $pdo->prepare("SELECT orders.ord_id, product.pname,item.quantity, product.price*item.quantity
            FROM orders join item on orders.ord_id = item.ord_id join product on item.pid = product.pid 
            where orders.username =?");
            $stmt->bindParam(1, $_SESSION["username"]);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "order ที่: " . $row ["ord_id"] . "<br>";
                echo "ชื่อสินค้า: " . $row ["pname"] . "  <br>";
                echo "จำนวนชิ้น: " . $row ["quantity"] . " ชิ้น <br>";
                echo "ราคา: " . $row ["product.price*item.quantity"] . " บาท <br>";
                echo "<hr>\n";
            }
        }
        else{
            $stmt = $pdo->prepare("SELECT orders.username, count(DISTINCT orders.ord_id), sum(item.quantity), sum(item.quantity*product.price)
            FROM orders join item on orders.ord_id = item.ord_id join product on item.pid = product.pid 
            group by orders.username");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "username: " . $row ["username"] . "<br>";
                echo "จำนวน order: " . $row ["count(DISTINCT orders.ord_id)"] . "  <br>";
                echo "จำนวนชิ้น: " . $row ["sum(item.quantity)"] . " ชิ้น <br>";
                echo "ราคารวม: " . $row ["sum(item.quantity*product.price)"] . " บาท <br>";
                echo "<hr>\n";
            }
        }
    } else {
        echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
        echo "<a href='login-form.php'>เข้าสู่ระบบอีกครั้ง</a>";
    }
?>
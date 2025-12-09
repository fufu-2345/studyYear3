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
        
        if($row["username"] == "somsak"){
            $stmt = $pdo->prepare('SELECT username FROM member WHERE username != "somsak"');
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "usename: " . $row ["username"] . "<br>";
                ?>
                <form method="post" action="userdetail.php?username=<?=$row["username"]?>">
					<input type="submit" value="ตรวจสอบ">	   
				</form>
                <hr><?php
            }
            ?>
            <br/><br/>
            <b>สินค้าคงเหลือ</b><br/>
            <div style="display:flex">	
                <?php
                $stmt = $pdo->prepare('SELECT pid, pname, quantity FROM product');
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<div>";
                    echo "<img src='img/" . $row['pid'] . ".jpg' width='75'><br/>";
                    echo "รหัสสินค้า: " . $row ["pid"] . "<br/>";
                    echo "ชื่อสินค้า: " . $row ["pname"] . "<br/>";
                    echo "จำนวนคงเหลือ: " . $row ["quantity"] . "<br/><br/>";
                    echo "</div>";
                    ?>
                    </div>
                    <?php
                }
                ?>
                <br/><br/>
                <a href='logout.php'>ออกจากระบบ</a>
                <?php
        }
        else{
            header("location: index2.php");
        }
        
    } else {
        echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
        echo "<a href='index.php'>เข้าสู่ระบบอีกครั้ง</a>";
    }
?>
<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT orders.ord_id, member.username, sum(item.quantity), sum(item.quantity*product.price) 
        from orders join item on orders.ord_id=item.ord_id 
        join product on product.pid=item.pid 
        join member on member.username = orders.username
            where member.username = ? group by orders.ord_id;");
        $stmt->bindParam(1, $_GET["username"]);      
        $stmt->execute();
        ?>
        <div style="padding: 15px">
            <b>username: 
            <?php
            echo  $_GET["username"] . '</b><br/><br/><br/>';
            while($row = $stmt->fetch()){
                echo 'order ID: ' . $row['ord_id'] . '<br/>';
                // echo 'username: ' . $row['username'] . '<br/>';
                echo 'จำนวนสินค้าที่ซื้อ: ' . $row['sum(item.quantity)'] . '<br/>';
                echo 'ราคารวม: ' . $row['sum(item.quantity*product.price)'] . '<hr/>';
            }
            ?>
            <br/><br/>
            <form action="check-login.php" method="POST">
                <input type="hidden" name="username" value="somsak"><br>
                <input type="hidden" name="password" value="1899"><br>
                <input type="submit" value="BACK">
            </form>
        </div>
    </body>
</html>

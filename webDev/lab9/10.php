<?php include "./connect.php" ?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div style="display:flex">
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $stmt = $pdo->prepare("INSERT INTO product VALUES (?, ?, ?, ?)");
                $stmt->bindParam(1, $_POST["pid"]);
                $stmt->bindParam(2, $_POST["pname"]);
                $stmt->bindParam(3, $_POST["pdetail"]);
                $stmt->bindParam(4, $_POST["price"]);
                $stmt->execute();
            }
        ?>

        <form method="post">
            <input type="text" name="pid" placeholder="pid"></intput><br/>
            <input type="text" name="pname" placeholder="pname"></intput><br/>
            <input type="text" name="pdetail" placeholder="pdetail"></intput><br/>
            <input type="text" name="price" placeholder="price"></intput><br/>
            <input type="submit" value="เพิ่มข้อมูล"><br/><br/>
        </from>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            while($row=$stmt->fetch()):
        ?>
            <div style="padding: 15px; text-align: center">
                <img src='./product_photo/<?=$row["pid"]?>.jpg' width='100'><br>
                <?=$row ["pname"]?><br><?=$row ["pdetail"]?><br>price:<?=$row ["price"]?>
            </div>
        <?php endwhile;?>
    </div>
</body></html>

<?php include "./connect.php" ?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        if (isset($_GET["keyword"])) {
            $stmt = $pdo->prepare("SELECT * FROM product WHERE pname=?");
            $stmt->bindParam(1, $_GET["keyword"]);
            $stmt->execute();
            $row = $stmt->fetch();
        }
        ?>

        <?php if (isset($row)): ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?=$row['pid']?>"> 
            <input type="text" name="pname" placeholder="pname" value="<?=$row['pname']?>" required><br/>
            <input type="text" name="pdetail" placeholder="pdetail" value="<?=$row['pdetail']?>"><br/>
            <input type="text" name="price" placeholder="price" value="<?=$row['price']?>"><br/>
            <input type="file" name="pic" accept="image/*"><br/>
            <input type="submit" value="แก้ไขข้อมูล"><br/><br/>
        </form>
        <?php endif; ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pname"])) {
            $pid = $_POST["pid"]; 
            $target_directory = "./product_photo/";
            $filePath = $target_directory . $pid . ".jpg";

            $stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
            $stmt->bindParam(1, $_POST["pname"]);
            $stmt->bindParam(2, $_POST["pdetail"]);
            $stmt->bindParam(3, $_POST["price"]);
            $stmt->bindParam(4, $pid);
            $stmt->execute();

            if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] === UPLOAD_ERR_OK) {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                move_uploaded_file($_FILES["pic"]["tmp_name"], $filePath);
            }

            header("location: 13.php");
            exit;
        }
        ?>

        <form method="get">
            <input type="text" name="keyword" placeholder="ระบุชื่อสินค้าที่ต้องการแก้ไข" required>
            <input type="submit" value="เลือก">
        </form>

        <div style="display:flex">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            while($row = $stmt->fetch()):
        ?>
                <div style="padding: 15px; text-align: center">
                    <img src='./product_photo/<?=$row["pid"]?>.jpg' width='100'><br>
                    <?=$row["pname"]?><br>
                    <?=$row["pdetail"]?><br>price: <?=$row["price"]?><br/>
                </div>
        <?php endwhile;?>
        </div>
    </body>
</html>

<?php include "./connect.php" ?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        if (isset($_GET["keyword"])) {
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username=?");
            $stmt->bindParam(1, $_GET["keyword"]);
            $stmt->execute();
            $row = $stmt->fetch();
        }
        ?>

        <?php if (isset($row)): ?>
        <form method="post">
            <input type="hidden" name="keyword" value="<?=$row['username']?>">
            <input type="text" name="username" placeholder="username" value="<?=$row['username']?>" required><br/>
            <input type="text" name="password" placeholder="password" value="<?=$row['password']?>" required><br/>
            <input type="text" name="name" placeholder="name" value="<?=$row['name']?>" required><br/>
            <input type="text" name="address" placeholder="address" value="<?=$row['address']?>" required><br/>
            <input type="text" name="mobile" placeholder="mobile" value="<?=$row['mobile']?>" required><br/>
            <input type="text" name="email" placeholder="email" value="<?=$row['email']?>" required><br/>
            <input type="submit" value="แก้ไขข้อมูล"><br/><br/>
        </form>
        <?php endif; ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"])) {
            $stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=? WHERE username=?");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->bindParam(3, $_POST["name"]);
            $stmt->bindParam(4, $_POST["address"]);
            $stmt->bindParam(5, $_POST["mobile"]);
            $stmt->bindParam(6, $_POST["email"]);
            $stmt->bindParam(7, $_POST["keyword"]);
            $stmt->execute();
            header("location: 9.php");
        }
        ?>

        <form method="get">
            <input type="text" name="keyword" placeholder="ระบุชื่อคนที่ต้องการแก้ไข" required>
            <input type="submit" value="เลือก">
        </form>

        <div style="display:flex">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            while($row = $stmt->fetch()):
        ?>
                <div style="padding: 15px; text-align: center">
                    <img src='./member_photo/<?=$row["username"]?>.jpg' width='100'><br>
                    <?=$row["username"]?><br>
                    <?=$row["name"]?><br><?=$row["email"]?><br/>
                </div>
        <?php endwhile;?>
        </div>
    </body>
</html>

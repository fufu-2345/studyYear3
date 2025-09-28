<?php include "./connect.php" ?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
        <div style="display:flex">
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $_POST["username"]);
                $stmt->bindParam(2, $_POST["password"]);
                $stmt->bindParam(3, $_POST["name"]);
                $stmt->bindParam(4, $_POST["address"]);
                $stmt->bindParam(5, $_POST["mobile"]);
                $stmt->bindParam(6, $_POST["email"]);
                $stmt->execute();

                if (isset($_FILES["profilePic"])) {
                    $file = $_FILES["profilePic"];
                    $file_name = $file["name"];
                    $file_tmp = $file["tmp_name"];
                    $file_error = $file["error"];

                    if ($file_error === UPLOAD_ERR_OK) {
                        $target_directory = "./member_photo/";
                        $target_file = $target_directory . $_POST["username"] . ".jpg";
                    }
                }
            }
        ?>

        <form method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="username"><br/>
            <input type="text" name="password" placeholder="password"><br/>
            <input type="text" name="name" placeholder="name"><br/>
            <input type="text" name="address" placeholder="address"><br/>
            <input type="text" name="mobile" placeholder="mobile"><br/>
            <input type="text" name="email" placeholder="email"><br/>
            <input type="file" name="profilePic" accept="image/*"><br/>
            <input type="submit" value="เพิ่มข้อมูล"><br/><br/>
        </form>

        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            while($row = $stmt->fetch()):
        ?>
            <div style="padding: 15px; text-align: center">
                <img src='./member_photo/<?=$row["username"]?>.jpg' width='100'><br>
                <?=$row["username"]?><br><?=$row["name"]?><br><?=$row["email"]?>
            </div>
        <?php endwhile;?>
    </div>
  </body>
</html>

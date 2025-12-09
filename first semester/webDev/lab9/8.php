<?php include "./connect.php" ?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div style="display:flex">
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $_POST["username"]);
                $stmt->bindParam(2, $_POST["password"]);
                $stmt->bindParam(3, $_POST["name"]);
                $stmt->bindParam(4, $_POST["address"]);
                $stmt->bindParam(5, $_POST["mobile"]);
                $stmt->bindParam(6, $_POST["email"]);
                $stmt->execute();
                header("location: redirect.php");
            }
        ?>

        <form method="post">
            <input type="text" name="username" placeholder="username"></input><br/>
            <input type="text" name="password" placeholder="password"></intput><br/>
            <input type="text" name="name" placeholder="name"></intput><br/>
            <input type="text" name="address" placeholder="address"></intput><br/>
            <input type="text" name="mobile" placeholder="mobile"></intput><br/>
            <input type="text" name="email" placeholder="email"></input><br/>
            <input type="submit" value="เพิ่มข้อมูล"><br/><br/>
        </from>
    </div> 
</body></html>

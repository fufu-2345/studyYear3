<?php include "./connect.php" ?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member where username=?");
            $stmt->bindParam(1, $_GET["username"]);
            $stmt->execute();
            $row=$stmt->fetch()
        ?>

            <div style="display: flex;">
                <img src='./member_photo/<?=$row["username"]?>.jpg' width='300'><br>
                <div style="margin-top:auto; margin-bottom:auto; margin-left: 20px;">
                    <b style="font-size: 25px;">ชื่อผู้ใช้: <?=$row ["username"]?></b><br/><br/>
                    ชื่อ-นามสกุล: <?=$row ["name"]?><br/>
                    ที่อยู่: <?=$row ["address"]?><br/>
                    เบอร์โทร: <?=$row ["mobile"]?><br/>
                    อีเมล: <?=$row ["email"]?><br/>
                </div>
            </div>
        <pre>

        </pre>

    </div>
    

    
</body></html>

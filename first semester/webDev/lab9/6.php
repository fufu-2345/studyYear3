<?php include "./connect.php" ?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <form>
        <input type="text" name="keyword" placeholder="Search keyword">
        <input type="submit" value="ลบข้อมูล">
    </form>

    <div style="display:flex">
        <?php
            $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
            $stmt->bindParam(1, $_GET["keyword"]);
            if ($stmt->execute())
            //     header("location: 5.php");
        ?>
    
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            while($row=$stmt->fetch()):
        ?>
            <div style="padding: 15px; text-align: center">
                <img src='./member_photo/<?=$row["username"]?>.jpg' width='100'><br>
                <?=$row ["username"]?><br><?=$row ["name"]?><br><?=$row ["email"]?>
            </div>
        <?php endwhile;?>
    </div>
    

    
</body></html>

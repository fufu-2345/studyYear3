<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 11 Form</title>
</head>
<body>
    <form action="HW11_Add.php" method="post" enctype="multipart/form-data">
        ชื่อผู้ใช้: <input type="text"   name="username" required><br>
        รหัสผ่าน:  <input type="password" name="password" required><br>
        ชื่อ-นามสกุล: <input type="text" name="name" required><br>
        ที่อยู่: <textarea name="address" rows="3" cols="40" required></textarea><br>
        เบอร์โทร: <input type="text"   name="mobile" required><br>
        อีเมล์:   <input type="email"  name="email"  required><br>
        รูปสินค้า: <input type="file" name="photo" accept="image/*" required><br>
        <input type="submit" value="เพิ่มสมาชิก">
    </form>
    
</body>
</html>
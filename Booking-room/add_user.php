<?php
// เชื่อมต่อกับฐานข้อมูล
include 'db/db_connection.php'; 

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // รับค่าจากฟอร์ม
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน

    // สร้างคำสั่ง SQL เพื่อเพิ่มผู้ใช้
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password); // ผูกค่าตัวแปรกับคำสั่ง SQL

    // ตรวจสอบการเพิ่มผู้ใช้
    if ($stmt->execute()) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>

<!-- ฟอร์มสำหรับเพิ่มผู้ใช้ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>เพิ่มผู้ใช้ใหม่</h2>
    <form action="add_user.php" method="post">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">เพิ่มผู้ใช้</button>
    </form>
</body>
</html>

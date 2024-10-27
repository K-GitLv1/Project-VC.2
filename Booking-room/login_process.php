<?php
session_start(); // เริ่ม session

// เชื่อมต่อฐานข้อมูล
include 'db/db_connection.php'; // สมมติว่าไฟล์นี้ใช้สำหรับเชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลในฐานข้อมูล (ต้องปรับโค้ดให้เข้ากับฐานข้อมูลของคุณ)
    $sql = "SELECT * FROM users WHERE username='$username'"; // ดึงข้อมูลผู้ใช้ที่มีชื่อผู้ใช้ที่ตรงกัน
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // ถ้าพบผู้ใช้
        $row = mysqli_fetch_assoc($result); // ดึงข้อมูลผู้ใช้
        $hashedPassword = $row['password']; // รับรหัสผ่านที่เข้ารหัสจากฐานข้อมูล

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $hashedPassword)) {
            // ถ้ารหัสผ่านถูกต้อง
            $_SESSION['username'] = $username; // เก็บชื่อผู้ใช้ใน session
            header("Location: index.php"); // เปลี่ยนเส้นทางไปยัง index.php
            exit(); // ออกจากสคริปต์
        } else {
            echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"; // แสดงข้อความถ้ามีข้อผิดพลาด
        }
    } else {
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"; // แสดงข้อความถ้ามีข้อผิดพลาด
    }
}
?>

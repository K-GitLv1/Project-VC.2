<?php
session_start(); // เริ่ม session

// เชื่อมต่อฐานข้อมูล
include 'db/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลในฐานข้อมูล (ต้องปรับโค้ดให้เข้ากับฐานข้อมูลของคุณ)
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // ถ้ารหัสผ่านถูกต้อง
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['id']; // เพิ่มการเซ็ต user_id ลงใน session
        
            // แสดง alert ว่ารหัสถูกต้องและเปลี่ยนเส้นทาง
            echo "<script>
                    alert('เข้าสู่ระบบสำเร็จ');
                    window.location.href = 'index.php';
                  </script>";
            exit();
        }else {
            // รหัสไม่ถูกต้อง
            echo "<script>
                    alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                    window.location.href = 'login.php';
                  </script>";
            exit();
        }
    } else {
        // ไม่พบชื่อผู้ใช้
        echo "<script>
                alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
}
?>

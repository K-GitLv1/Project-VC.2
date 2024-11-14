<?php
session_start();
require 'db/epf.php'; // ไฟล์เชื่อมต่อกับฐานข้อมูล


// สมมติว่า user_id ถูกเก็บไว้ใน session หลังจากที่ผู้ใช้ล็อกอิน
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "กรุณาล็อกอินก่อน";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $profile_pic = $_FILES['profile_pic']['name'] ? $_FILES['profile_pic']['name'] : null;

    // อัพโหลดรูปโปรไฟล์
    if ($profile_pic) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
    }

    // อัพเดทข้อมูลในตาราง users
    $stmt = $pdo->prepare("UPDATE users SET username=? WHERE id=?");
    $stmt->execute([$username, $user_id]);

    // อัพเดทข้อมูลในตาราง profiles
    $stmt = $pdo->prepare("UPDATE profiles SET first_name=?, last_name=?, email=?, phone=?, profile_pic=? WHERE user_id=?");
    $stmt->execute([$first_name, $last_name, $email, $phone, $profile_pic, $user_id]);

    echo "อัพเดทโปรไฟล์เรียบร้อยแล้ว!";
}

// ดึงข้อมูลจากตาราง users และ profiles
$stmt = $pdo->prepare("SELECT users.username, profiles.* FROM users JOIN profiles ON users.id = profiles.user_id WHERE users.id = ?");
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

// ตรวจสอบว่ามีข้อมูลใน $profile หรือไม่
$profile = $stmt->fetch();
if (!$profile) {
    // กำหนดค่าเริ่มต้นให้กับ $profile ในกรณีที่ไม่พบข้อมูล
    $profile = [
        'username' => '',
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'profile_pic' => 'pic/defpro.jpg' // ใช้รูปโปรไฟล์เริ่มต้น
    ];
}
    
?>

<!DOCTYPE html>
<html lang="th">
<head>

    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/epf.css">
    
    <script src="js/hgtab.js"></script>
    <meta charset="UTF-8">
    <title>แก้ไขโปรไฟล์</title>


</head>
<body>



    
<div class="edit-profile">
    <div class="edit-profile-header">
        <h1 align="center">แก้ไขโปรไฟล์</h1>
    </div>
    <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
        
        <div class="input-group">
            <label>ชื่อผู้ใช้:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($profile['username']) ?>" required>
        </div>
        
        <div class="input-group">
            <label>ชื่อ:</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($profile['first_name']) ?>" required>
        </div>
        
        <div class="input-group">
            <label>นามสกุล:</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($profile['last_name']) ?>" required>
        </div>
        
        <div class="input-group">
            <label>อีเมล:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($profile['email']) ?>" required>
        </div>
        
        <div class="input-group">
            <label>เบอร์โทร:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($profile['phone']) ?>">
        </div>
        
        <div class="input-group">
            <label>รูปโปรไฟล์:</label>
            <input type="file" name="profile_pic">
            
        </div><br>

        <button type="submit">อัพเดทโปรไฟล์</button>
    </form>
    <div class="footer">
        <!-- สามารถใส่ footer ได้ตามต้องการ -->
    </div>
</div>

</body>
</html>

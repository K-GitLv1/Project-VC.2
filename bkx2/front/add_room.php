<?php
// เชื่อมต่อฐานข้อมูล
include 'db/db_connection.php';

// ถ้าฟอร์มถูกส่ง
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_name = $_POST['room_name'];
    
    $description = $_POST['description'];
    $location = $_POST['location'];
    $room_number = $_POST['room_number'];
    $capacity = $_POST['capacity'];

    // อัปโหลดไฟล์
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . time() . "_" . $image_name; // ป้องกันชื่อซ้ำ
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ตรวจสอบชนิดไฟล์
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "ไฟล์ที่อัปโหลดไม่ใช่รูปภาพ.";
            $uploadOk = 0;
        }
    }

    // ตรวจสอบนามสกุลไฟล์
    if (
        $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "webp"
    ) {
        echo "อนุญาตเฉพาะไฟล์ JPG, JPEG, PNG, WEBP.";
        $uploadOk = 0;
    }

    // อัปโหลดไฟล์
    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // เพิ่มการบันทึกรูปภาพในฐานข้อมูล พร้อมตั้งค่า is_visible = 1 (เปิดการมองเห็น)
        $sql = "INSERT INTO rooms (room_name, description, location, room_number, capacity, image, is_visible, created_at) 
                VALUES ('$room_name', '$description', '$location', '$room_number', $capacity, '$target_file', 1, now())";

        if ($conn->query($sql) === TRUE) {
            echo "เพิ่มห้องประชุมเรียบร้อย!";
        } else {
            echo "ข้อผิดพลาด: " . $conn->error;
        }
    } else {
        echo "ไม่สามารถอัปโหลดไฟล์รูปภาพได้.";
    }

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มห้องประชุม</title>
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/addr.css"> <!-- ใช้ addr.css -->
    <link rel="stylesheet" href="css/bk.css">
    <script src="js/bk.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'check_login.php'; ?>
    <div class="container">
        <h2>เพิ่มห้องประชุม</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="room_name">ชื่อห้อง:</label>
            <input type="text" id="room_name" name="room_name" required><br><br>

            

            <label for="description">รายละเอียด:</label><br>
            <textarea id="description" name="description" rows="4" required></textarea><br><br>

            <label for="location">อาคาร/สถานที่:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="room_number">เลขที่ห้อง:</label>
            <input type="text" id="room_number" name="room_number" required><br><br>

            <label for="capacity">จำนวนที่นั่ง:</label>
            <input type="number" id="capacity" name="capacity" required><br><br>

            <label for="image">รูปภาพ:</label>
            <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" required><br><br>

            <button type="submit">บันทึก</button>
        </form>
    </div>

    <!-- Footer -->
    
    <?php include 'footer.php'; ?>
</body>
</html>
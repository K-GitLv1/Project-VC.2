<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="js/hgtab.js"></script>
    
    <style>
        body {
            font-family: "Noto Sans Thai", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            margin: 0;
            overflow-x: hidden;
        }

        /* สไตล์สำหรับ .header */
        .header {
            width: 100%;
            background-color: #4e54c8;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Hamburger menu icon */
        .menu-icon {
            position: fixed;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 1100;
        }

        .menu-icon div {
            width: 30px;
            height: 4px;
            background-color: white;
            margin: 6px 0;
            transition: 0.4s;
        }

        /* Sidebar menu */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #4e54c8;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            z-index: 1000;
            color: white;
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #3b41b9;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 36px;
            cursor: pointer;
        }

        /* ทำให้เนื้อหาด้านล่างไม่ซ้อนกับ .header */
        .login-container {
            margin-top: 100px; /* ระยะห่างจาก .header */
            text-align: center;
        }

        /* เพิ่มการตั้งค่าให้ .close-btn ให้มีเลเยอร์ด้านหน้าสุด */
.close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 36px;
    cursor: pointer;
    z-index: 1200; /* เพิ่มเลเยอร์ให้อยู่ด้านหน้าสุด */
}

/* ปรับ sidebar ให้สูงกว่าตัว header */
.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: -250px;
    background-color: #4e54c8;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    z-index: 1100; /* ให้อยู่เหนือ header */
}

    </style>



</head>
<body>
    <!-- Hamburger menu icon -->
    <div class="menu-icon" onclick="openSidebar()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Sidebar menu -->
    <div id="sidebar" class="sidebar">
        <span class="close-btn" onclick="closeSidebar()">&times;</span>
        <a href="index.php">หน้าหลัก</a>
        <a href="#">จองห้อง</a>
        <a href="login.php">เข้าสู่ระบบ</a>
    </div>

    <!-- ส่วน header -->
    <div class="header">
        เข้าสู่ระบบ
    </div>

    <!-- ส่วน login-container -->
    <div class="login-container">
        <div class="login-header">
            <h1>E-Booking</h1>
            <p>ระบบจองห้องประชุม</p>
        </div>
        <form action="login_process.php" method="post">
            <div class="input-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="input-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">เข้าสู่ระบบ</button>
        </form>
        <div class="footer">
            
        </div>
    </div>
</body>
</html>

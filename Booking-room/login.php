<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/login2.css">
    <link rel="stylesheet" href="css/theme.css">
    <!-- <link rel="stylesheet" href="css/hbg.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="js/hgtab.js"></script>
    <script src="js/login.js"></script>
    
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
    <img src="pic/logo.png" alt="Logo" style="width: 60px; height: 60px; margin-right: 10px;">
    <div>
        <p class="main-title">Booking</p>
        <p class="sub-title">ระบบจองห้องประชุม</p>
    </div>
</div>




    <!-- ส่วน login-container -->
    <div class="login">
        <div class="login-header">
            <h1 align ='center'>ลงชื่อเข้าใช้</h1>
           
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

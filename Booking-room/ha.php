<!-- Header Section -->
<div class="header">
    <img src="pic/logo.png" alt="Logo" style="width: 60px; height: 60px; margin-right: 10px;">
    <div>
        <p class="main-title">Booking</p>
        <p class="sub-title">ระบบจองห้องประชุม</p>
    </div>
</div>

<!-- Hamburger menu icon -->
<div class="menu-icon" onclick="openSidebar()">
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- Sidebar menu -->
<div id="sidebar" class="sidebar" align="center">
    <span class="close-btn" onclick="closeSidebar()">&times;</span>

    <a href="index.php">หน้าหลัก</a>
    <a href="bk.php">จองห้อง</a>
    <a href="">เกี่ยวกับ</a>
    <?php if (isset($_SESSION['username'])): ?>
        <div class="user-profile" style="margin-bottom: 20px;">
            <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="User Profile" style="width: 80px; height: 80px; border-radius: 50%;">
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    <?php endif; ?>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <a href="logout.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">ออกจากระบบ</a> <!-- ลิงก์ออกจากระบบพร้อม redirect -->
</div>

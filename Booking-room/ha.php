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
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php if (isset($_SESSION['username'])): ?>
    <div class="user-profile" style="margin-bottom: 20px;">
        <!-- เพิ่มลิงก์ไปที่หน้า edit_profile.php -->
        <a href="edit_profile.php">
            <!-- ตรวจสอบว่า $_SESSION['profile_pic'] มีค่าหรือไม่ ถ้าไม่มีให้ใช้ pic/defpro.jpg -->
            <img src="<?php echo !empty($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'pic/defpro.jpg'; ?>" 
                 alt="User Profile" 
                 style="width: 80px; height: 80px; border-radius: 50%;">
        </a>
        <p><?php echo $_SESSION['username']; ?></p>
    </div>
<?php endif; ?>


    
    
    <br>
    <a href="logout.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">ออกจากระบบ</a> <!-- ลิงก์ออกจากระบบพร้อม redirect -->
</div>

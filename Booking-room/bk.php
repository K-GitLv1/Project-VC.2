<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองห้อง</title>
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/bk.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.js"></script>
    <script src="js/bk.js"></script>
    

</head>
<body>
<?php 
    include 'check_login.php';
?>
<div class="container">
    <h2>ห้อง / รายการ</h2>
    
    <table class="room-table">
        <thead>
            <tr>
                <th>รายละเอียดห้อง</th>
                <th>การดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="room-info">
                        <span class="room-name">ห้องประชุม 2</span>
                        <p>ห้องประชุมพร้อมระบบ Video conference ที่นั่งผู้เข้าร่วมประชุม รูปตัว U 2 แถว</p>
                    </div>
                </td>
                <td>
                    <button class="btn btn-book">จองห้อง</button>
                    <button class="btn btn-detail" onclick="openModal('ห้องประชุม 2', 'ห้องประชุมพร้อมระบบ Video conference ที่นั่งผู้เข้าร่วมประชุม รูปตัว U 2 แถว')">รายละเอียด</button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="room-info">
                        <span class="room-name">ห้องประชุม 1</span>
                        <p>ห้องประชุมขนาดใหญ่ พร้อมสิ่งอำนวยความสะดวกครบครัน</p>
                    </div>
                </td>
                <td>
                    <button class="btn btn-book">จองห้อง</button>
                    <button class="btn btn-detail" onclick="openModal('ห้องประชุม 1', 'ห้องประชุมขนาดใหญ่ พร้อมสิ่งอำนวยความสะดวกครบครัน')">รายละเอียด</button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="room-info">
                        <span class="room-name">ห้องประชุมส่วนเทคโนโลยีสารสนเทศ</span>
                        <p>ห้องประชุมขนาดใหญ่ (Hall) เหมาะสำหรับการสัมมนาเป็นหมู่คณะ และจัดเลี้ยง</p>
                    </div>
                </td>
                <td>
                    <button class="btn btn-book">จองห้อง</button>
                    <button class="btn btn-detail" onclick="openModal('ห้องประชุมส่วนเทคโนโลยีสารสนเทศ', 'ห้องประชุมขนาดใหญ่ (Hall) เหมาะสำหรับการสัมมนาเป็นหมู่คณะ และจัดเลี้ยง')">รายละเอียด</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="roomModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>รายละเอียดห้องประชุม</h2>
        <div id="roomDetails">
            <!-- Room details will be injected here -->
        </div>
    </div>
</div>


<footer>
    <p>ProjectVC.2 2024 | E-Booking System</p>
</footer>
</body>
</html>

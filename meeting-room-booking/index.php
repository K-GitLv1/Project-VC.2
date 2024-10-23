<?php
include 'php/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองห้องประชุม</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>จองห้องประชุม</h1>

        <form action="php/book_room.php" method="POST" id="bookingForm">
            <label for="room">เลือกห้องประชุม:</label>
            <select name="room" id="room">
                <?php
                $result = $conn->query("SELECT * FROM Rooms");
                if ($result) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['room_name']) . "</option>";
                    }
                } else {
                    echo "<option value=''>ไม่สามารถโหลดห้องประชุม</option>";
                }
                ?>
            </select>

            <label for="start_time">เวลาเริ่มต้น:</label>
            <input type="datetime-local" name="start_time" id="start_time" required>

            <label for="end_time">เวลาสิ้นสุด:</label>
            <input type="datetime-local" name="end_time" id="end_time" required>

            <input type="submit" value="จองห้อง">
        </form>

        <h2>รายการการจอง</h2>
        <div class="bookings">
            <?php
            // คิวรีการจอง
            $result = $conn->query("SELECT * FROM Bookings JOIN Rooms ON Bookings.room_id = Rooms.id");
            if ($result) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "ห้อง: " . htmlspecialchars($row['room_name']) . " | เวลาเริ่มต้น: " . htmlspecialchars($row['start_time']) . " | เวลาสิ้นสุด: " . htmlspecialchars($row['end_time']) . "<br>";
                    }
                } else {
                    echo "ไม่มีการจองห้องประชุม";
                }
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>

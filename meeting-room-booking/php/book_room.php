<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['room'], $_POST['start_time'], $_POST['end_time'])) {
        $room_id = $_POST['room'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        // ตรวจสอบว่าห้องว่างในเวลาที่ต้องการหรือไม่
        $check_query = "SELECT * FROM Bookings WHERE room_id = ? AND ('$start_time' < end_time AND '$end_time' > start_time)";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("i", $room_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('เวลานี้มีการจองแล้ว กรุณาเลือกเวลาอื่น');
                    window.history.back();
                  </script>";
        } else {
            $insert_query = "INSERT INTO Bookings (room_id, start_time, end_time) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("iss", $room_id, $start_time, $end_time);

            if ($stmt->execute()) {
                echo "<script>
                        alert('จองห้องสำเร็จ!');
                        window.location.href = '../index.php';
                      </script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Request method is not valid.');
            window.history.back();
          </script>";
}

$conn->close();
?>

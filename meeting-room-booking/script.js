document.getElementById("bookingForm").addEventListener("submit", function(event) {
    var startTime = new Date(document.getElementById("start_time").value);
    var endTime = new Date(document.getElementById("end_time").value);
    var message = document.getElementById("message");
  
    if (endTime <= startTime) {
      event.preventDefault();
      message.textContent = "เวลาสิ้นสุดต้องมากกว่าเวลาเริ่มต้น!";
    } else {
      message.textContent = "";
    }
  });
  
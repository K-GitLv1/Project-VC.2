// เปิด Modal พร้อมแสดงข้อมูลห้อง
function openModal(roomName, roomDetail) {
    const modal = document.getElementById('roomModal');
    const roomDetails = document.getElementById('roomDetails');
    roomDetails.innerHTML = `
        <p><strong>ชื่อห้อง:</strong> ${roomName}</p>
        <p><strong>รายละเอียด:</strong> ${roomDetail}</p>
    `;
    modal.style.display = 'block';
}

// ปิด Modal
function closeModal() {
    const modal = document.getElementById('roomModal');
    modal.style.display = 'none';
}

// ปิด Modal เมื่อคลิกนอก Modal
window.onclick = function (event) {
    const modal = document.getElementById('roomModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

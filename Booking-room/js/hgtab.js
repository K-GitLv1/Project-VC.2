function openSidebar() {
    document.getElementById("sidebar").style.left = "0";
}

function closeSidebar() {
    document.getElementById("sidebar").style.left = "-250px";
}
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById("sidebar");
    const menuIcon = document.querySelector('.menu-icon');
    const closeBtn = document.querySelector('.close-btn');

    // ถ้าคลิกที่ sidebar หรือปุ่มปิด ก็ไม่ต้องทำอะไร
    if (sidebar.contains(event.target) || closeBtn.contains(event.target)) {
        return;
    }

    // ถ้าคลิกนอก sidebar หรือ hamburger icon ให้ปิด sidebar
    if (!menuIcon.contains(event.target)) {
        sidebar.style.left = "-250px"; // ปิด sidebar
    }
});

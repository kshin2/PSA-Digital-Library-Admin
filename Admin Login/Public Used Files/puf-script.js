
// Sidebar toggle logic
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector("#btn"); // Sidebar toggle button

// When the sidebar menu button is clicked, toggle sidebar open/close
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
})

// Update menu button icon based on sidebar state
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

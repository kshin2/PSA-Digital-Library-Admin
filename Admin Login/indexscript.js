let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");


closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
})

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

menuBtnChange();

$(document).ready(function () {
    setTimeout(() => {
        $('.home-section').addClass('fade-in');
    }, 300); // slight delay allows the transition to kick in
});

function triggerFadeInSection() {
    const section = $('.home-section');
    section.removeClass('fade-in');

    // Wait for fade-out, then fade back in
    setTimeout(() => {
        section.addClass('fade-in');
    }, 200);
}


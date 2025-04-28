const modal = document.getElementById("administrativeModal");
const modalBtn = document.getElementById("openModalBtn");
const closeButton = document.getElementsByClassName("close-btn")[0];

modalBtn.onclick = function () {
  modal.classList.add("open");
  document.body.style.overflow = "hidden";
};

closeButton.onclick = function () {
  modal.classList.remove("open");
  document.body.style.overflow = "auto";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.classList.remove("open");
    document.body.style.overflow = "auto";
  }
};

document.addEventListener('DOMContentLoaded', function () {
  // Modal Elements
  const modal = document.getElementById("administrativeModal");
  const modalBtn = document.getElementById("openModalBtn");
  const closeButton = document.getElementsByClassName("close-btn")[0];

  const editModal = document.getElementById("editModal");
  const editCloseButton = document.getElementsByClassName("edit-close")[0];
  const deleteModal = document.getElementById("deleteModal");
  const deleteCloseButton = document.getElementsByClassName("delete-close")[0];

  // Handle Add Administrative Modal
  modalBtn.onclick = function () {
    modal.classList.add("open");
    document.body.style.overflow = "hidden";
  };

  closeButton.onclick = function () {
    modal.classList.remove("open");
    document.body.style.overflow = "auto";
  };

  // Handle Edit Button Click
  document.querySelectorAll(".edit-btn").forEach((editButton) => {
    editButton.onclick = function () {
      const adminId = this.getAttribute('data-id');
      const adminTitle = this.getAttribute('data-title');
      const adminProject = this.getAttribute('data-project');
      const adminFile = this.getAttribute('data-file');

      document.getElementById("editId").value = adminId;
      document.getElementById("editTitle").value = adminTitle;
      document.getElementById("editProject").value = adminProject;
      document.getElementById("currentFileLink").href = `pdfs_administrative/${adminFile}`;
      document.getElementById("currentFileLink").innerText = "View PDF";

      editModal.classList.add("open");
      document.body.style.overflow = "hidden";
    };
  });

  // Close Edit Modal
  editCloseButton.onclick = function () {
    editModal.classList.remove("open");
    document.body.style.overflow = "auto";
  };

  // Handle Delete Button Click
  document.querySelectorAll(".delete-btn").forEach((deleteButton) => {
    deleteButton.onclick = function () {
      const adminId = this.getAttribute('data-id');
      deleteModal.classList.add("open");
      document.body.style.overflow = "hidden";
      document.getElementById("confirmDeleteBtn").setAttribute("data-id", adminId);
    };
  });

  // Confirm Delete
  document.getElementById("confirmDeleteBtn").onclick = function () {
    const adminId = this.getAttribute("data-id");
    console.log("Deleted administrative ID:", adminId);
    deleteModal.classList.remove("open");
    document.body.style.overflow = "auto";
  };

  // Close Delete Modal
  deleteCloseButton.onclick = function () {
    deleteModal.classList.remove("open");
    document.body.style.overflow = "auto";
  };

  // Close modals on outside click
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.classList.remove("open");
      document.body.style.overflow = "auto";
    }
    if (event.target == editModal) {
      editModal.classList.remove("open");
      document.body.style.overflow = "auto";
    }
    if (event.target == deleteModal) {
      deleteModal.classList.remove("open");
      document.body.style.overflow = "auto";
    }
  };

  // Sidebar toggle logic
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector("#btn");

  sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
      sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  }
});


// Sidebar toggle logic
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector("#btn");

sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  menuBtnChange();
});

function menuBtnChange() {
  if (sidebar.classList.contains("open")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else {
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
}

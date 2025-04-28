document.addEventListener('DOMContentLoaded', function () {
    // === Modal for Adding Infographics ===
    const modal = document.getElementById("infographicsModal");
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
  
    // === Edit Modal Elements ===
    const editModal = document.getElementById("editModal");
    const editCloseButton = document.getElementsByClassName("edit-close")[0];
  
    // === Delete Modal Elements ===
    const deleteModal = document.getElementById("deleteModal");
    const deleteCloseButton = document.getElementsByClassName("delete-close")[0];
  
    // Handle Edit Button Click
    document.querySelectorAll(".edit-btn").forEach((editButton) => {
      editButton.onclick = function () {
        const id = this.getAttribute("data-id");
        const title = this.getAttribute("data-title");
        const file = this.getAttribute("data-file");
  
        document.getElementById("editId").value = id;
        document.getElementById("editTitle").value = title;
        document.getElementById("currentFileLink").href = `pdfs_wam/${file}`;
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
        const id = this.getAttribute("data-id");
  
        document.getElementById("confirmDeleteBtn").setAttribute("data-id", id);
        deleteModal.classList.add("open");
        document.body.style.overflow = "hidden";
      };
    });
  
    // Confirm Delete
    document.getElementById("confirmDeleteBtn").onclick = function () {
      const id = this.getAttribute("data-id");
      console.log("Deleted infographic ID:", id); // Replace with actual delete AJAX call if needed
  
      deleteModal.classList.remove("open");
      document.body.style.overflow = "auto";
    };
  
    // Close Delete Modal
    deleteCloseButton.onclick = function () {
      deleteModal.classList.remove("open");
      document.body.style.overflow = "auto";
    };
  
    // Close modals when clicking outside of them
    window.onclick = function (event) {
      if (event.target === modal) {
        modal.classList.remove("open");
      }
      if (event.target === editModal) {
        editModal.classList.remove("open");
      }
      if (event.target === deleteModal) {
        deleteModal.classList.remove("open");
      }
  
      if (!modal.classList.contains("open") &&
          !editModal.classList.contains("open") &&
          !deleteModal.classList.contains("open")) {
        document.body.style.overflow = "auto";
      }
    };
  
    // === Sidebar toggle logic ===
    const sidebar = document.querySelector(".sidebar");
    const sidebarBtn = document.querySelector("#btn");
  
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
  
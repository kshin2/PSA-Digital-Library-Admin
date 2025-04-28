const modal = document.getElementById("householdModal");
const modalBtn = document.getElementById("openModalBtn"); // Button to trigger modal
const closeButton = document.getElementsByClassName("close-btn")[0]; // Close button in modal

// When the user clicks the "Add Household" button, open the modal
modalBtn.onclick = function() {
  modal.classList.add("open"); // Add "open" class to trigger the smooth transition
  document.body.style.overflow = "hidden"; // Prevent scrolling when modal is open
}

// When the user clicks on <span> (x) in the modal, close it
closeButton.onclick = function() {
  modal.classList.remove("open"); // Remove the "open" class to close with transition
  document.body.style.overflow = "auto"; // Allow scrolling again when modal is closed
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("open"); // Close modal if clicked outside
    document.body.style.overflow = "auto"; // Allow scrolling again
  }
}

document.addEventListener('DOMContentLoaded', function() {
    // Get references to modals and their close buttons
    const modal = document.getElementById("householdModal");
    const modalBtn = document.getElementById("openModalBtn");
    const closeButton = document.getElementsByClassName("close-btn")[0];
  
    const editModal = document.getElementById("editModal");
    const editCloseButton = document.getElementsByClassName("edit-close")[0];
    const deleteModal = document.getElementById("deleteModal");
    const deleteCloseButton = document.getElementsByClassName("delete-close")[0];
  
    // Handle Add Household Modal
    modalBtn.onclick = function() {
      modal.classList.add("open");
      document.body.style.overflow = "hidden";
    }
  
    closeButton.onclick = function() {
      modal.classList.remove("open");
      document.body.style.overflow = "auto";
    }
  
    // Handle Edit Button Click
    document.querySelectorAll(".edit-btn").forEach((editButton) => {
      editButton.onclick = function() {
        const householdId = this.getAttribute('data-id');
        const householdTitle = this.getAttribute('data-title');
        const householdProject = this.getAttribute('data-project');
        const householdFile = this.getAttribute('data-file');
  
        document.getElementById("editId").value = householdId;
        document.getElementById("editTitle").value = householdTitle;
        document.getElementById("editProject").value = householdProject;
        document.getElementById("currentFileLink").href = `pdfs_household/${householdFile}`;
        document.getElementById("currentFileLink").innerText = "View PDF";
  
        editModal.classList.add("open");
        document.body.style.overflow = "hidden";
      };
    });
  
    // Close Edit Modal
    editCloseButton.onclick = function() {
      editModal.classList.remove("open");
      document.body.style.overflow = "auto";
    };
  
    // Handle Delete Button Click
    document.querySelectorAll(".delete-btn").forEach((deleteButton) => {
      deleteButton.onclick = function() {
        const householdId = this.getAttribute('data-id');
        deleteModal.classList.add("open");
        document.body.style.overflow = "hidden";
        document.getElementById("confirmDeleteBtn").setAttribute("data-id", householdId);
      };
    });
  
    // Confirm Delete
    document.getElementById("confirmDeleteBtn").onclick = function() {
      const householdId = this.getAttribute("data-id");
      console.log("Deleted household ID:", householdId);
      deleteModal.classList.remove("open");
      document.body.style.overflow = "auto";
    };
  
    // Close Delete Modal
    deleteCloseButton.onclick = function() {
      deleteModal.classList.remove("open");
      document.body.style.overflow = "auto";
    };
  
    // Close modals on outside click
    window.onclick = function(event) {
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
  

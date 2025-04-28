
const modal = document.getElementById("infographicsModal");
const modalBtn = document.getElementById("openModalBtn"); // Button to trigger modal
const closeButton = document.getElementsByClassName("close-btn")[0]; // Close button in modal

// When the user clicks the "Add Infographics" button, open the modal
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
    // Get references to Edit Modal and its elements
    const editModal = document.getElementById("editModal");
    const editCloseButton = document.getElementsByClassName("edit-close")[0]; // Close button in edit modal
    const deleteModal = document.getElementById("deleteModal");
    const deleteCloseButton = document.getElementsByClassName("delete-close")[0]; // Close button in delete modal

    // Handle Edit Button Click
    document.querySelectorAll(".edit-btn").forEach((editButton) => {
        editButton.onclick = function() {
            const infographicId = this.getAttribute('data-id');
            const infographicTitle = this.getAttribute('data-title');
            const infographicFile = this.getAttribute('data-file');

            // Set values in the edit modal
            document.getElementById("editId").value = infographicId;
            document.getElementById("editTitle").value = infographicTitle;
            document.getElementById("currentFileLink").href = `pdfs/${infographicFile}`;
            document.getElementById("currentFileLink").innerText = "View PDF"; // Link text

            // Open the edit modal
            editModal.classList.add("open");
            document.body.style.overflow = "hidden"; // Prevent scrolling
        };
    });

    // Close Edit Modal
    editCloseButton.onclick = function() {
        editModal.classList.remove("open");
        document.body.style.overflow = "auto"; // Allow scrolling
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.classList.remove("open");
            document.body.style.overflow = "auto"; // Allow scrolling
        }
        if (event.target == deleteModal) {
            deleteModal.classList.remove("open");
            document.body.style.overflow = "auto"; // Allow scrolling
        }
    };

    // Handle Delete Button Click
    document.querySelectorAll(".delete-btn").forEach((deleteButton) => {
        deleteButton.onclick = function() {
            const infographicId = this.getAttribute('data-id');
            // Open delete modal
            deleteModal.classList.add("open");
            document.body.style.overflow = "hidden"; // Prevent scrolling
            // Store the infographic ID for delete action if needed
            document.getElementById("confirmDeleteBtn").setAttribute("data-id", infographicId);
        };
    });

    // Handle Confirm Delete
    document.getElementById("confirmDeleteBtn").onclick = function() {
        const infographicId = this.getAttribute("data-id");
        // Perform the delete action with the ID
        console.log("Deleted infographic ID:", infographicId);
        // Close the delete modal
        deleteModal.classList.remove("open");
        document.body.style.overflow = "auto"; // Allow scrolling
    };

    // Close Delete Modal
    deleteCloseButton.onclick = function() {
        deleteModal.classList.remove("open");
        document.body.style.overflow = "auto"; // Allow scrolling
    };
});


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

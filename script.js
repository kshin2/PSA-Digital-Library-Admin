console.log("Script loaded");

document.addEventListener("DOMContentLoaded", function () {
    const formSubmitted = document.getElementById("formSubmitted").value === 'true';
    const modalElement = document.getElementById("welcomeModal");
    const form = document.getElementById("popupForm");
    const inputs = form.querySelectorAll("input, select");
    const checkbox = document.getElementById("privacy_policy_accepted");
    const confirmButton = document.getElementById("confirmButton");
    const welcomeModal = new bootstrap.Modal(modalElement);

    // ✅ Show modal only if user hasn't submitted the form yet
    if (!formSubmitted) {
        welcomeModal.show();
    }

    // 🔁 Form validation
    function checkForm() {
        let isFormValid = true;
        inputs.forEach(input => {
            if (input.type !== "checkbox" && !input.value.trim()) {
                isFormValid = false;
            }
        });
        confirmButton.disabled = !(isFormValid && checkbox.checked);
    }

    inputs.forEach(input => input.addEventListener("input", checkForm));
    checkbox.addEventListener("change", checkForm);

    // 🛡 Prevent native form submission (in case someone tries to press Enter)
    form.addEventListener("submit", function (e) {
        e.preventDefault();
    });

    // 📨 Form submission via AJAX (ensure only one confirmation occurs)
    confirmButton.addEventListener("click", function (event) {
        event.preventDefault();  // Prevent the default form submit

        // Disable the button after the first click to prevent re-clicking
        confirmButton.disabled = true;

        // Show confirmation dialog
        if (confirm("Are you sure you want to submit this form?")) {
            // Proceed with AJAX submission if confirmed
            fetch('save_form.php', {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);

                if (data.includes("success")) {
                    const modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) modalInstance.hide();

                    setTimeout(() => {
                        alert("Form submitted successfully.");
                        window.location.href = "Sample.php";  // Redirect after success
                    }, 500);
                } else {
                    alert("Error submitting the form. Please try again.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while submitting the form.");
            });
        } else {
            // Re-enable the button if the user cancels
            confirmButton.disabled = false;
        }
    });
});

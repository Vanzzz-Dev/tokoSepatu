document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("userPassword");
    const togglePasswordBtn = document.getElementById("togglePasswordBtn");
    const togglePasswordIcon = document.getElementById("togglePasswordIcon");

    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener("click", function () {
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);

            // Ganti icon class Tabler-Icons nya
            if (type === "password") {
                togglePasswordIcon.className = "ti ti-eye fs-5";
            } else {
                togglePasswordIcon.className = "ti ti-eye-off fs-5";
            }
        });
    }
});

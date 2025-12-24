(function () {

    document.addEventListener("DOMContentLoaded", () => {

        const token = localStorage.getItem("auth_token");
        const role  = localStorage.getItem("user_role");

        // ===== GLOBAL AUTH GUARD =====
        if (!token && !window.location.pathname.includes("login.php")) {
            redirectToLogin();
            return;
        }

        const isAdminPage = window.location.pathname.includes("/admin/");

        if (token) {
            if (isAdminPage && role !== "admin") {
                forceLogout();
            }

            if (!isAdminPage && role !== "user") {
                forceLogout();
            }
        }
    });

})();

// ===== LOGOUT WITH API =====
async function logout() {
    const token = localStorage.getItem("auth_token");

    try {
        if (token) {
            await fetch(`${BASE_URL}/logout`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${token}`
                }
            });
        }
    } catch (error) {
        // API failure should not block logout
        console.error("Logout API error:", error);
    } finally {
        localStorage.clear();
        redirectToLogin();
    }
}

// ===== HELPERS =====
function redirectToLogin() {
    alert("redirectToLogin 54 line");
    window.location.href = getRootPath() + "login.php";
}

function forceLogout() {
    alert("force logout 58 line");
    // localStorage.clear();
    // redirectToLogin();
}

function getRootPath() {
    alert("getRootPath 64 line");
    // handles /admin/* and root pages
    return window.location.pathname.includes("/admin/") ? "../" : "";
}

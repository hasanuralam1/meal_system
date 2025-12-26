(function () {

    document.addEventListener("DOMContentLoaded", () => {

        const token = localStorage.getItem("auth_token");
        const role  = localStorage.getItem("user_role");

        const loginBtn  = document.getElementById("loginBtn");
        const logoutBtn = document.getElementById("logoutBtn");

        const isLoginPage = window.location.pathname.includes("login.php");
        const isAdminPage = window.location.pathname.includes("/admin/");

        /* ===============================
           AUTH GUARD
        =============================== */

        if (!token && !isLoginPage) {
            redirectToLogin();
            return;
        }

        if (token) {
            // Role protection
            if (isAdminPage && role !== "admin") {
                forceLogout();
                return;
            }

            if (!isAdminPage && role !== "user") {
                forceLogout();
                return;
            }
        }

        /* ===============================
           NAVBAR BUTTON STATE
        =============================== */

        if (token) {
            loginBtn?.classList.add("hidden");
            logoutBtn?.classList.remove("hidden");
        } else {
            loginBtn?.classList.remove("hidden");
            logoutBtn?.classList.add("hidden");
        }

    });

})();

/* ===============================
   LOGOUT
=============================== */
async function logout() {
    const token = localStorage.getItem("auth_token");

    try {
        if (token) {
            await fetch(`${BASE_URL}/logout`, {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`
                }
            });
        }
    } catch (e) {
        console.warn("Logout API failed");
    } finally {
        localStorage.clear();
        redirectToLogin();
    }
}

/* ===============================
   HELPERS
=============================== */
function redirectToLogin() {
    window.location.href = getRootPath() + "login.php";
}

function forceLogout() {
    localStorage.clear();
    redirectToLogin();
}

function getRootPath() {
    return window.location.pathname.includes("/admin/") ? "../" : "";
}

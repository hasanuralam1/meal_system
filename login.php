<?php
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | <?= SITE_NAME ?></title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#2563eb",
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
      Login to <?= SITE_NAME ?>
    </h2>

    <form id="loginForm" class="space-y-4">

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input
          type="email"
          id="email"
          required
          placeholder="Enter your email"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary"
        />
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input
          type="password"
          id="password"
          required
          placeholder="Enter your password"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-primary text-white py-2 rounded-md font-semibold hover:bg-blue-700 transition"
      >
        Login
      </button>
    </form>

    <p id="errorMsg" class="text-red-500 text-sm mt-3 hidden"></p>

    <p class="text-center text-sm text-gray-600 mt-4">
      Don’t have an account?
      <a href="register.php" class="text-primary font-semibold hover:underline">
        Register
      </a>
    </p>
  </div>

  <!-- JS Config from PHP -->
  <script>
    const BASE_URL = "<?= BASE_URL ?>";
  </script>

  <!-- Login API Script -->
 <script>
document.getElementById("loginForm").addEventListener("submit", async function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const errorMsg = document.getElementById("errorMsg");

  errorMsg.classList.add("hidden");

  try {
    const res = await fetch(`${BASE_URL}/login`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        email: email,
        password: password
      })
    });

    const data = await res.json();
    console.log("LOGIN RESPONSE:", data);

    if (data.status) {
      // Normalize role
      const role = data.data.role ? data.data.role.toLowerCase() : "user";

      localStorage.setItem("auth_token", data.token);
      localStorage.setItem("user_name", data.data.name);
      localStorage.setItem("user_role", role);

      // Role-based redirect
      if (role === "admin") {
        window.location.replace("admin/dashboard.php");
      } else {
        window.location.replace("dashboard.php");
      }
    } else {
      errorMsg.textContent = data.message || "Invalid login credentials";
      errorMsg.classList.remove("hidden");
    }

  } catch (err) {
    console.error(err);
    errorMsg.textContent = "Server error. Please try again.";
    errorMsg.classList.remove("hidden");
  }
});
</script>


</body>
</html>

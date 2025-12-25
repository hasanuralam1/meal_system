<?php require_once "config/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Registration</title>

  <!-- Tailwind CSS CDN -->
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
      Registration
    </h2>

    <form id="registerForm" class="space-y-4">

      <!-- Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input type="text" id="name" required
          placeholder="Enter full name"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary" />
      </div>

      <!-- Phone -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
        <input type="tel" id="phone" required
          placeholder="Enter phone number"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary" />
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" required
          placeholder="Enter email address"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary" />
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" required
          placeholder="Enter password"
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary" />
      </div>

      <!-- Status -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select id="status" required
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary">
          <option value="">Select status</option>
          <option value="active">Active</option>
          <option value="deactive">Deactive</option>
        </select>
      </div>

      <!-- Role -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
        <select id="role" required
          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-primary">
          <option value="">Select role</option>
          <option value="user">User</option>
          <option value="manager">Manager</option>
        </select>
      </div>

      <!-- Submit -->
      <button type="submit"
        class="w-full bg-primary text-white py-2 rounded-md font-semibold hover:bg-blue-700 transition">
        Register
      </button>

    </form>

    <p id="msg" class="text-sm mt-4 text-center hidden"></p>
  </div>

  <!-- BASE URL FROM CONFIG -->
  <script>
    const BASE_URL = "<?= BASE_URL ?>";
  </script>

  <!-- REGISTER SCRIPT -->
  <script>
    document.getElementById("registerForm").addEventListener("submit", async function (e) {
      e.preventDefault();

      const payload = {
        name: document.getElementById("name").value,
        phone: document.getElementById("phone").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
        status: document.getElementById("status").value,
        role: document.getElementById("role").value
      };

      const msg = document.getElementById("msg");
      msg.classList.add("hidden");

      try {
        const res = await fetch(`${BASE_URL}/register`, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(payload)
        });

        const data = await res.json();

        if (data.status === true) {
          msg.textContent = "Registration successful! Redirecting to login...";
          msg.className = "text-green-600 text-sm mt-4 text-center";

          setTimeout(() => {
            window.location.href = "login.php";
          }, 1500);
        } else {
          msg.textContent = data.message || "Registration failed";
          msg.className = "text-red-600 text-sm mt-4 text-center";
        }

      } catch (err) {
        msg.textContent = "Server error. Try again later.";
        msg.className = "text-red-600 text-sm mt-4 text-center";
      }

      msg.classList.remove("hidden");
    });
  </script>

</body>
</html>

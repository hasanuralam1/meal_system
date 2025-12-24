<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meal Management System</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    rel="stylesheet"
  />
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- NAVBAR -->
  <nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-14">

        <!-- Brand -->
        <div class="text-lg font-semibold text-gray-700">
          Meal Management System
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex gap-6 text-sm font-medium text-gray-700">
          <a href="index.html" class="text-blue-600">Home</a>
          <a href="dashboard.html" class="hover:text-blue-600">Dashboard</a>
          <a href="login.php" class="hover:text-blue-600">Login</a>
        </div>

        <!-- Mobile Hamburger -->
        <button id="menuBtn" class="md:hidden text-gray-700">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
      <div class="px-4 py-3 space-y-2 text-sm text-gray-700">
        <a href="index.html" class="block font-semibold">Home</a>
        <a href="dashboard.html" class="block">Dashboard</a>
        <a href="login.php" class="block">Login</a>
      </div>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-4 py-16 text-center">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
        Meal Management System
      </h1>
      <p class="text-gray-600 max-w-2xl mx-auto mb-8">
        A simple and efficient system to manage daily meals, user records,
        deposits, marketing expenses, and reports — all in one place.
      </p>

      <div class="flex justify-center gap-4">
        <a
          href="login.php"
          class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          Login
        </a>
        <a
          href="dashboard.html"
          class="px-6 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50"
        >
          Go to Dashboard
        </a>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="py-14">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl font-semibold text-center text-gray-800 mb-10">
        System Features
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-users text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">User Management</h3>
          <p class="text-sm text-gray-600">
            Manage users, roles, and activity status easily.
          </p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-utensils text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Meal Tracking</h3>
          <p class="text-sm text-gray-600">
            Track daily meals with date, day, and status.
          </p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-money-bill-wave text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Deposit Records</h3>
          <p class="text-sm text-gray-600">
            Maintain user deposits with date and payment mode.
          </p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-store text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Marketing Cost</h3>
          <p class="text-sm text-gray-600">
            Track marketing and grocery expenses efficiently.
          </p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-trash text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Dustbin Records</h3>
          <p class="text-sm text-gray-600">
            Log waste or disposal data by date and user.
          </p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
          <i class="fa-solid fa-chart-line text-blue-600 text-2xl mb-3"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Reports</h3>
          <p class="text-sm text-gray-600">
            View summarized reports and daily activity.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-white border-t mt-auto">
    <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm text-gray-600">
      © 2025 Meal Management System. All rights reserved.
    </div>
  </footer>

  <!-- HAMBURGER SCRIPT -->
  <script>
    const btn = document.getElementById("menuBtn");
    const menu = document.getElementById("mobileMenu");
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

</body>
</html>

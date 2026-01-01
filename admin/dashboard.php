<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">

<!-- ===== TOP NAVBAR ===== -->
<header class="bg-white shadow fixed w-full z-40">
  <div class="flex items-center justify-between px-6 py-4">
    <div class="flex items-center gap-4">
      <!-- Mobile Menu Button -->
      <button onclick="toggleSidebar()" class="md:hidden text-gray-700 text-2xl">
        ☰
      </button>
      <h1 class="text-xl font-bold text-indigo-600">Admin Panel</h1>
    </div>

    <div class="flex items-center gap-4">
      <span class="text-sm text-gray-600 hidden sm:block">Admin</span>
      <img src="https://i.pravatar.cc/40" class="rounded-full w-10 h-10" />
    </div>
  </div>
</header>

<!-- ===== LAYOUT ===== -->
<div class="flex pt-20">

  <!-- ===== SIDEBAR ===== -->
  <aside id="sidebar"
    class="bg-white w-64 min-h-screen shadow-md fixed md:static transform -translate-x-full md:translate-x-0 transition duration-300 z-50">

    <nav class="p-6 space-y-4 text-gray-700">
      <a href="" class="block px-4 py-2 rounded bg-indigo-600 text-white">Dashboard</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">Users</a>
      <a href="meals.php" class="block px-4 py-2 rounded hover:bg-gray-100">Meals</a>
      <a href="user_meal.php" class="block px-4 py-2 rounded hover:bg-gray-100">User Meals</a>
      <a href="marketing.php" class="block px-4 py-2 rounded hover:bg-gray-100">marketing</a>
      <a href="deposit.php" class="block px-4 py-2 rounded hover:bg-gray-100">deposit</a>
      <a href="dustbin.php" class="block px-4 py-2 rounded hover:bg-gray-100">dustbin</a>
      <a href="#" class="block px-4 py-2 rounded text-red-600 hover:bg-red-50">Logout</a>
    </nav>
  </aside>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="flex-1 p-6 md:ml-64 space-y-6">

    <!-- ===== DASHBOARD CARDS ===== -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500 text-sm">Total Users</h3>
        <p class="text-2xl font-bold text-indigo-600">128</p>
      </div>
      <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500 text-sm">Total Meals</h3>
        <p class="text-2xl font-bold text-green-600">56</p>
      </div>
      <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500 text-sm">Orders</h3>
        <p class="text-2xl font-bold text-orange-500">89</p>
      </div>
      <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500 text-sm">Revenue</h3>
        <p class="text-2xl font-bold text-blue-600">₹24,500</p>
      </div>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="bg-white shadow rounded overflow-x-auto">
      <div class="p-4 border-b">
        <h2 class="font-semibold text-lg">Recent Users</h2>
      </div>

      <table class="w-full min-w-[700px] text-sm text-center">
        <thead class="bg-gray-200">
          <tr>
            <th class="p-3 border">ID</th>
            <th class="p-3 border">Name</th>
            <th class="p-3 border">Email</th>
            <th class="p-3 border">Status</th>
            <th class="p-3 border">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-gray-50">
            <td class="p-3 border">1</td>
            <td class="p-3 border">Hasan</td>
            <td class="p-3 border">hasan@mail.com</td>
            <td class="p-3 border">
              <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-xs">Active</span>
            </td>
            <td class="p-3 border">
              <button class="text-indigo-600 hover:underline">View</button>
            </td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 border">2</td>
            <td class="p-3 border">Admin</td>
            <td class="p-3 border">admin@mail.com</td>
            <td class="p-3 border">
              <span class="px-2 py-1 bg-red-100 text-red-600 rounded text-xs">Inactive</span>
            </td>
            <td class="p-3 border">
              <button class="text-indigo-600 hover:underline">View</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="text-center text-sm text-gray-500 pt-4">
      © 2025 Meal Management System | Admin Panel
    </footer>

  </main>
</div>

<!-- ===== SCRIPT ===== -->
<script>
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
  }
</script>

</body>
</html>

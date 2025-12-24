<nav class="bg-gray-900 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 h-12 flex items-center justify-between">

        <!-- ADMIN MENU -->
        <div class="flex gap-4 text-sm font-medium">
            <a href="dashboard.php">Admin Dashboard</a>
            <a href="users.php">Users</a>
            <a href="reports.php">Reports</a>
        </div>

        <button onclick="logout()"
            class="bg-red-600 px-3 py-1 rounded text-sm">
            Logout
        </button>
    </div>
</nav>

<script src="../config/auth.js"></script>

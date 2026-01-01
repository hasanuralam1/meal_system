<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-white shadow relative z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-12">

                <!-- Title -->
                <div class="hidden md:flex gap-4 text-sm font-medium text-gray-700">
                    <a href="dashboard.php" class="hover:text-blue-600">Dashboard</a>
                    <a href="user_meal.php" class="hover:text-blue-600">Users Meal</a>
                    <a href="deposit.php" class="hover:text-blue-600">Deposite</a>
                    <a href="meals.php" class="hover:text-blue-600">Meals</a>
                    <a href="marketing.php" class="hover:text-blue-600">Marketing</a>
                    <a href="dustbin.php" class="hover:text-blue-600">Dustbin</a>
                </div>

                <!-- Right Buttons -->
                <div class="flex space-x-3">
                    <!-- Login Button -->
                    <button id="loginBtn"
                        onclick="window.location.href='login.php'"
                        class="flex items-center gap-1 text-sm px-3 py-1 border rounded hover:bg-gray-100">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </button>

                    <!-- Logout Button -->
                    <button id="logoutBtn"
                        onclick="logout()"
                        class="hidden flex items-center gap-1 text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </button>
                </div>

                <!-- Hamburger -->
                <button id="menuBtn" class="md:hidden text-gray-700 text-lg">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (OVERLAY – DOES NOT PUSH CONTENT) -->
        <div id="mobileMenu" class="hidden md:hidden absolute top-12 left-0 w-full bg-white border-t shadow-lg">
            <div class="px-4 py-3 space-y-2 text-sm text-gray-700">
                <a href="dashboard.php" class="block font-semibold">Dashboard</a>
                <a href="users.php" class="block">Users</a>
                <a href="deposit.php" class="block">Deposite</a>
                <a href="meals.php" class="block">Meals</a>
                <a href="user_meal.php" class="block">User Meals</a>
                <a href="marketing.php" class="block">Marketing</a>
                <a href="dustbin.php" class="block">Dustbin</a>
            </div>
        </div>
    </nav>
    <script src="config/auth.js"></script>

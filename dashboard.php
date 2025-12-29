
<?php include('header.php') ?>
<script>
    if (!localStorage.getItem("auth_token")) {
        window.location.href = "login.php";
    }
</script>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

        <!-- DASHBOARD GRID -->
<!-- Mobile: 2 | Desktop: 4 -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    <!-- Card 1 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">MENU</h4>
            <p class="text-xl font-semibold text-gray-800">dal,egg,rice</p>
        </div>
        <i class="fas fa-users text-3xl text-blue-500"></i>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Total Deposite</h4>
            <p class="text-xl font-semibold text-gray-800">1,120</p>
            <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-green-600">This Month : </span> 1,120</p>
            <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-red-900">Total Due : </span> 120</p>
            <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-red-600">This Month Due : </span> 20</p>
        </div>
         <i class="fas fa-wallet text-3xl text-indigo-500"></i>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Meals</h4>
              <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-green-900">Total Meal This Year : </span> 120</p>
            <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-green-600">This Month Meal : </span> 20</p>
        </div>
        <i class="fas fa-user-check text-3xl text-green-500"></i>
    </div>


    <!-- Card 4 -->
     <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Notification</h4>
              <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-green-900">Marketing : </span> 0</p>
            <p class="text-xs font-semibold text-gray-800"><span class="text-xs text-green-600">Dustbinl : </span> 1</p>
        </div>
         <i class="fas fa-bullhorn text-3xl text-orange-500"></i>
    </div>

    <!-- Card 5 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Total Deposits</h4>
            <p class="text-xl font-semibold text-gray-800">₹ 2.4L</p>
            <span class="text-xs text-green-600">This month</span>
        </div>
        <i class="fas fa-wallet text-3xl text-indigo-500"></i>
    </div>

    <!-- Card 6 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Marketing</h4>
            <p class="text-xl font-semibold text-gray-800">₹ 86K</p>
            <span class="text-xs text-gray-500">Total spent</span>
        </div>
        <i class="fas fa-bullhorn text-3xl text-orange-500"></i>
    </div>

    <!-- Card 7 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Dustbin Entry</h4>
            <p class="text-xl font-semibold text-gray-800">42</p>
            <span class="text-xs text-gray-500">This week</span>
        </div>
        <i class="fas fa-trash text-3xl text-gray-500"></i>
    </div>

    <!-- Card 8 -->
    <div class="bg-white rounded shadow p-4 flex justify-between items-center">
        <div>
            <h4 class="text-xs text-gray-500 uppercase">Pending Actions</h4>
            <p class="text-xl font-semibold text-gray-800">9</p>
            <span class="text-xs text-red-600">Need review</span>
        </div>
        <i class="fas fa-exclamation-circle text-3xl text-red-500"></i>
    </div>

</div>


        <!-- TABLE (PROFESSIONAL RESPONSIVE) -->
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full min-w-[900px] text-sm text-center border-collapse">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-4 py-3">SL No</th>
                        <th class="border px-4 py-3">ID</th>
                        <th class="border px-4 py-3">User ID</th>
                        <th class="border px-4 py-3">User Name</th>
                        <th class="border px-4 py-3">Date</th>
                        <th class="border px-4 py-3">Status</th>
                        <th class="border px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">1</td>
                        <td class="border px-4 py-3">101</td>
                        <td class="border px-4 py-3">U001</td>
                        <td class="border px-4 py-3">Hasanur Alam</td>
                        <td class="border px-4 py-3">2025-12-23</td>
                        <td class="border px-4 py-3">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Active
                            </span>
                        </td>
                        <td class="border p-2 space-x-1">
                            <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
                        </td>
                    </tr>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">2</td>
                        <td class="border px-4 py-3">102</td>
                        <td class="border px-4 py-3">U002</td>
                        <td class="border px-4 py-3">Rahim Khan</td>
                        <td class="border px-4 py-3">2025-12-22</td>
                        <td class="border px-4 py-3">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Active
                            </span>
                        </td>
                        <td class="border p-2 space-x-1">
                            <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
                        </td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- last 5 days meal -->
 <div class="bg-white rounded shadow overflow-x-auto">
    <h4>Last 5 Day's Meal </h4>
            <table class="w-full min-w-[900px] text-sm text-center border-collapse">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-4 py-3">SL No</th>
                        <th class="border px-4 py-3">Meal</th>
                        <th class="border px-4 py-3">Day</th>
                        <th class="border px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">1</td>
                        <td class="border px-4 py-3">chicken</td>
                        <td class="border px-4 py-3">Sunday</td>
                        <td class="border px-4 py-3">2025-12-23</td>
                    </tr>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">2</td>
                        <td class="border px-4 py-3">Egg</td>
                        <td class="border px-4 py-3">Monday</td>
                        <td class="border px-4 py-3">2025-12-22</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- last 5 marketing -->

 <div class="bg-white rounded shadow overflow-x-auto">
     <h4>Last 5 Marketing </h4>
            <table class="w-full min-w-[900px] text-sm text-center border-collapse">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-4 py-3">SL No</th>
                         <th class="border px-4 py-3">User Name</th>
                        <th class="border px-4 py-3">Market</th>
                        <th class="border px-4 py-3">Price</th>
                        <th class="border px-4 py-3">Day</th>
                        <th class="border px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">1</td>
                         <td class="border px-4 py-3">test</td>
                        <td class="border px-4 py-3">chicken,potato</td>
                         <td class="border px-4 py-3">100,20</td>
                        <td class="border px-4 py-3">Sunday</td>
                        <td class="border px-4 py-3">2025-12-23</td>
                    </tr>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">2</td>
                         <td class="border px-4 py-3">abc</td>
                        <td class="border px-4 py-3">Egg,chili</td>
                         <td class="border px-4 py-3">50,10</td>
                        <td class="border px-4 py-3">Monday</td>
                        <td class="border px-4 py-3">2025-12-22</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>



    </main>

<?php include('footer.php') ?>
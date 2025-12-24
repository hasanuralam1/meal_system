
<?php include('header.php') ?>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

        <!-- DASHBOARD GRID -->
        <!-- Mobile: 2 | Desktop: 4 -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
            <div class="h-20 bg-white rounded shadow"></div>
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

    </main>

<?php include('footer.php') ?>
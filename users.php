
<?php include('header.php') ?>
 

  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">

      <!-- TABLE -->
      <table class="w-full border-collapse">
        <table class="w-full min-w-[900px] text-sm text-center border-collapse">
          <thead class="bg-gray-200 text-gray-700">
            <th class="border px-4 py-3">SL</th>
            <th class="border px-4 py-3">ID</th>
            <th class="border px-4 py-3">Name</th>
            <th class="border px-4 py-3">Email</th>
            <th class="border px-4 py-3">Phone</th>
            <th class="border px-4 py-3">Status</th>
            <th class="border px-4 py-3">Role</th>
            <th class="border px-4 py-3">Action</th>
            </tr>
          </thead>

          <tbody class="text-sm text-center">

            <!-- Row 1 -->
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-3">1</td>
              <td class="border px-4 py-3">101</td>
              <td class="border px-4 py-3">Hasanur Alam</td>
              <td class="border px-4 py-3">hasanur@mail.com</td>
              <td class="border px-4 py-3">01700000001</td>
              <td class="border px-4 py-3">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Active</span>
              </td>
              <td class="border p-2">User</td>
              <td class="border p-2 space-x-1">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-3">2</td>
              <td class="border px-4 py-3">102</td>
              <td class="border px-4 py-3">Rahim Khan</td>
              <td class="border px-4 py-3">rahim@mail.com</td>
              <td class="border px-4 py-3">01700000002</td>
              <td class="border px-4 py-3">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Active</span>
              </td>
              <td class="border px-4 py-3">Manager</td>
              <td class="border p-2 space-x-1">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
              </td>
            </tr>

            <!-- Row 3 -->
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-3">3</td>
              <td class="border px-4 py-3">103</td>
              <td class="border px-4 py-3">Karim Ali</td>
              <td class="border px-4 py-3">karim@mail.com</td>
              <td class="border px-4 py-3">01700000003</td>
              <td class="border px-4 py-3">
                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Deactive</span>
              </td>
              <td class="border p-2">User</td>
              <td class="border p-2 space-x-1">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>

    </div>
  </main>

  
  <!-- FOOTER -->
 <?php include('footer.php') ?>


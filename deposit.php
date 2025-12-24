

<?php include('header.php') ?>


  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">

      <!-- TABLE -->
      <table class="w-full min-w-[900px] text-sm text-center border-collapse">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th class="border px-4 py-3">SL No</th>
            <th class="border px-4 py-3">ID</th>
            <th class="border px-4 py-3">User ID</th>
            <th class="border px-4 py-3">Amount</th>
            <th class="border px-4 py-3">Date</th>
            <th class="border px-4 py-3">Mode</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

        <tbody class="text-sm text-center">

          <!-- Row 1 -->
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-3">1</td>
            <td class="border px-4 py-3">D001</td>
            <td class="border px-4 py-3">U001</td>
            <td class="border px-4 py-3">₹1,500</td>
            <td class="border px-4 py-3">2025-01-05</td>
            <td class="border px-4 py-3">Cash</td>
            <td class="border p-2 space-x-1">
              <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
              <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
              <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
            </td>
          </tr>
          </tr>

          <!-- Row 2 -->
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-3">2</td>
            <td class="border px-4 py-3">D002</td>
            <td class="border px-4 py-3">U002</td>
            <td class="border px-4 py-3">₹2,000</td>
            <td class="border px-4 py-3">2025-01-08</td>
            <td class="border px-4 py-3">UPI</td>
            <td class="border p-2 space-x-1">
              <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
              <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
              <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
            </td>
          </tr>
          </tr>

          <!-- Row 3 -->
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-3">3</td>
            <td class="border px-4 py-3">D003</td>
            <td class="border px-4 py-3">U003</td>
            <td class="border px-4 py-3">₹1,200</td>
            <td class="border px-4 py-3">2025-01-10</td>
            <td class="border px-4 py-3">Bank</td>
            <td class="border p-2 space-x-1">
              <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
              <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
              <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
            </td>
          </tr>
          </tr>

          <!-- Row 4 -->
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-3">4</td>
            <td class="border px-4 py-3">D004</td>
            <td class="border px-4 py-3">U004</td>
            <td class="border px-4 py-3">₹3,000</td>
            <td class="border px-4 py-3">2025-01-15</td>
            <td class="border px-4 py-3">Cash</td>
            <td class="border p-2 space-x-1">
              <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
              <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
              <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
            </td>
          </tr>
          </tr>

          <!-- Row 5 -->
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-3">5</td>
            <td class="border px-4 py-3">D005</td>
            <td class="border px-4 py-3">U005</td>
            <td class="border px-4 py-3">₹1,800</td>
            <td class="border px-4 py-3">2025-01-18</td>
            <td class="border px-4 py-3">UPI</td>
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
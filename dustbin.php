

<?php include('header.php'); include('config/config.php') ?>


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
            <th class="border px-4 py-3">Date</th>
            <th class="border px-4 py-3">Day Name</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

        <tbody id="dustbinTableBody" class="text-sm text-center">      

        </tbody>
      </table>

    </div>
  </main>

  
  <?php include('footer.php') ?>
  <script>
document.addEventListener("DOMContentLoaded", function () {

   const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  if (!token) {
    alert("Auth token not found. Please login again.");
    return;
  }

  fetch(`${BASE_URL}/dustbin/fetch_all`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(response => response.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to fetch data");
      return;
    }

    const tbody = document.getElementById("dustbinTableBody");
    tbody.innerHTML = "";

    result.data.forEach((item, index) => {

      tbody.insertAdjacentHTML("beforeend", `
        <tr class="hover:bg-gray-50">
          <td class="border px-4 py-3">${index + 1}</td>
          <td class="border px-4 py-3">${item.id}</td>
          <td class="border px-4 py-3">${item.user_id}</td>
          <td class="border px-4 py-3">${item.date}</td>
          <td class="border px-4 py-3 capitalize">${item.day_name}</td>
          <td class="border p-2 space-x-1">
            <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
          </td>
        </tr>
      `);
    });

  })
  .catch(error => {
    console.error("API Error:", error);
    alert("Something went wrong while fetching data.");
  });

});
</script>
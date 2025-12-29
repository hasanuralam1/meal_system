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

      <tbody id="dustbinTableBody" class="text-sm text-center"></tbody>
    </table>

  </div>
</main>

<!-- VIEW MODAL -->
<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">

    <h2 class="text-lg font-semibold mb-4">Dustbin Details</h2>

    <div class="space-y-2 text-sm">
      <p><strong>ID:</strong> <span id="v_id"></span></p>
      <p><strong>User ID:</strong> <span id="v_user_id"></span></p>
      <p><strong>Date:</strong> <span id="v_date"></span></p>
      <p><strong>Day Name:</strong> <span id="v_day"></span></p>

      <hr class="my-3">

      <p class="font-semibold">User Details</p>
      <p><strong>Name:</strong> <span id="v_name"></span></p>
      <p><strong>Email:</strong> <span id="v_email"></span></p>
      <p><strong>Phone:</strong> <span id="v_phone"></span></p>
      <p><strong>Status:</strong> <span id="v_status"></span></p>
      <p><strong>Role:</strong> <span id="v_role"></span></p>
    </div>

    <div class="mt-6 text-right">
      <button onclick="closeModal()" class="px-4 py-2 bg-gray-600 text-white rounded">
        Close
      </button>
    </div>

  </div>
</div>

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
            <button 
              onclick="viewDustbin(${item.id})"
              class="px-2 py-1 text-xs bg-blue-500 text-white rounded">
              View
            </button>
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

/* VIEW FUNCTION */
function viewDustbin(id) {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  fetch(`${BASE_URL}/dustbin/fetch/${id}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to load details");
      return;
    }

    const d = result.data;

    document.getElementById("v_id").innerText = d.id;
    document.getElementById("v_user_id").innerText = d.user_id;
    document.getElementById("v_date").innerText = d.date;
    document.getElementById("v_day").innerText = d.day_name;

    document.getElementById("v_name").innerText = d.user.name;
    document.getElementById("v_email").innerText = d.user.email;
    document.getElementById("v_phone").innerText = d.user.phone;
    document.getElementById("v_status").innerText = d.user.status;
    document.getElementById("v_role").innerText = d.user.role;

    document.getElementById("viewModal").classList.remove("hidden");
    document.getElementById("viewModal").classList.add("flex");
  });
}

/* CLOSE MODAL */
function closeModal() {
  document.getElementById("viewModal").classList.add("hidden");
  document.getElementById("viewModal").classList.remove("flex");
}
</script>



<?php include('header.php'); include('config/config.php') ?>


  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">
      <div class="p-4 text-right">
  <button 
    onclick="openAddDepositModal()"
    class="px-4 py-2 bg-green-600 text-white rounded text-sm">
    + Add Deposit
  </button>
</div>



<!-- FILTER SECTION -->
<div class="p-4 bg-gray-50 border-b flex flex-wrap gap-4 items-end">

  <!-- Min Amount -->
  <div>
    <label class="text-xs text-gray-600">Min Amount</label>
    <input type="number" id="filterMinAmount"
      class="border px-3 py-2 rounded text-sm w-40"
      placeholder="Min">
  </div>

  <!-- Max Amount -->
  <div>
    <label class="text-xs text-gray-600">Max Amount</label>
    <input type="number" id="filterMaxAmount"
      class="border px-3 py-2 rounded text-sm w-40"
      placeholder="Max">
  </div>

  <!-- Date -->
  <div>
    <label class="text-xs text-gray-600">Date</label>
    <input type="date" id="filterDate"
      class="border px-3 py-2 rounded text-sm w-44">
  </div>

  <!-- Mode -->
  <div>
    <label class="text-xs text-gray-600">Mode</label>
    <select id="filterMode"
      class="border px-3 py-2 rounded text-sm w-40">
      <option value="">All</option>
      <option value="cash">Cash</option>
      <option value="online">Online</option>
    </select>
  </div>

  <!-- Buttons
  <div class="flex gap-2">
    <button onclick="applyFilter()"
      class="px-4 py-2 bg-blue-600 text-white rounded text-sm">
      Apply
    </button> -->

    <button onclick="resetFilter()"
      class="px-4 py-2 bg-gray-600 text-white rounded text-sm">
      Reset
    </button>
  </div>

</div>



      <!-- TABLE -->
      <table class="w-full min-w-[900px] text-sm text-center border-collapse">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th class="border px-4 py-3">SL No</th>
            <!-- <th class="border px-4 py-3">ID</th> -->
            <th class="border px-4 py-3">User ID</th>
            <th class="border px-4 py-3">Amount</th>
            <th class="border px-4 py-3">Date</th>
            <th class="border px-4 py-3">Mode</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

        <tbody id="depositTableBody"  class="text-sm text-center">

          

        </tbody>
      </table>

    </div>
  </main>
  <!-- VIEW DEPOSIT MODAL -->
<div id="viewDepositModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-lg w-full max-w-md p-5 relative">

    <h2 class="text-lg font-semibold mb-4">Deposit Details</h2>

    <div class="space-y-2 text-sm">
      <p><strong>ID:</strong> <span id="v_id"></span></p>
      <p><strong>User Name:</strong> <span id="v_name"></span></p>
      <p><strong>Email:</strong> <span id="v_email"></span></p>
      <p><strong>Phone:</strong> <span id="v_phone"></span></p>
      <p><strong>Amount:</strong> ₹<span id="v_amount"></span></p>
      <p><strong>Date:</strong> <span id="v_date"></span></p>
      <p><strong>Mode:</strong> <span id="v_mode"></span></p>
    </div>

    <div class="mt-5 text-right">
      <button onclick="closeDepositModal()" class="px-4 py-1 bg-gray-600 text-white rounded">
        Close
      </button>
    </div>

  </div>
</div>
<!-- ADD DEPOSIT MODAL -->
<div id="addDepositModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-lg w-full max-w-md p-5">

    <h2 class="text-lg font-semibold mb-4">Add Deposit</h2>

    <div class="space-y-3 text-sm">
      <input type="number" id="a_user_id" placeholder="User ID"
        class="w-full border px-3 py-2 rounded">

      <input type="number" id="a_amount" placeholder="Amount"
        class="w-full border px-3 py-2 rounded">

      <input type="date" id="a_date"
        class="w-full border px-3 py-2 rounded">

      <select id="a_mode" class="w-full border px-3 py-2 rounded">
        <option value="">Select Mode</option>
        <option value="cash">Cash</option>
        <option value="online">Online</option>
      </select>
    </div>

    <div class="mt-5 text-right space-x-2">
      <button onclick="closeAddDepositModal()" class="px-4 py-1 bg-gray-500 text-white rounded">
        Cancel
      </button>
      <button onclick="saveDeposit()" class="px-4 py-1 bg-green-600 text-white rounded">
        Save
      </button>
    </div>

  </div>
</div>

 <script>
document.addEventListener("DOMContentLoaded", function () {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");
  const tableBody = document.getElementById("depositTableBody");

  console.log("BASE_URL:", BASE_URL);
  console.log("TOKEN:", token);

  if (!token) {
    alert("Auth token missing. Please login again.");
    return;
  }

  fetch(`${BASE_URL}/deposits/fetch_all`, {
    method: "POST",
    headers: {
      "Accept": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(response => response.json())
  .then(result => {

    console.log("API RESULT:", result);

    if (!result.status) {
      alert("Failed to fetch deposits");
      return;
    }

    tableBody.innerHTML = "";

    result.data.forEach((item, index) => {

      const row = `
        <tr class="hover:bg-gray-50">
          <td class="border px-4 py-3">${index + 1}</td>
          
          <td class="border px-4 py-3">${item.user_id}</td>
          <td class="border px-4 py-3">₹${item.amount}</td>
          <td class="border px-4 py-3">${item.date}</td>
          <td class="border px-4 py-3 capitalize">${item.mode}</td>
          <td class="border p-2 space-x-1">
           <button onclick="viewDeposit(${item.id})" class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>

            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
          </td>
        </tr>
      `;

      tableBody.insertAdjacentHTML("beforeend", row);
    });

  })
  .catch(error => {
    console.error("Fetch Error:", error);
    alert("Something went wrong!");
  });

});
</script>
<script>
function viewDeposit(id) {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  if (!token) {
    alert("Token missing");
    return;
  }

  fetch(`${BASE_URL}/deposits/fetch/${id}`, {
    method: "GET",
    headers: {
      "Accept": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to load deposit");
      return;
    }

    const data = result.data;

    document.getElementById("v_id").innerText = data.id;
    document.getElementById("v_name").innerText = data.user.name;
    document.getElementById("v_email").innerText = data.user.email;
    document.getElementById("v_phone").innerText = data.user.phone;
    document.getElementById("v_amount").innerText = data.amount;
    document.getElementById("v_date").innerText = data.date;
    document.getElementById("v_mode").innerText = data.mode;

    document.getElementById("viewDepositModal").classList.remove("hidden");
    document.getElementById("viewDepositModal").classList.add("flex");

  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}

function closeDepositModal() {
  document.getElementById("viewDepositModal").classList.add("hidden");
}
</script>


<script>
function openAddDepositModal() {
  document.getElementById("addDepositModal").classList.remove("hidden");
  document.getElementById("addDepositModal").classList.add("flex");
}

function closeAddDepositModal() {
  document.getElementById("addDepositModal").classList.add("hidden");
}

function saveDeposit() {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  const user_id = document.getElementById("a_user_id").value;
  const amount = document.getElementById("a_amount").value;
  const date = document.getElementById("a_date").value;
  const mode = document.getElementById("a_mode").value;

  if (!user_id || !amount || !date || !mode) {
    alert("All fields are required");
    return;
  }

  fetch(`${BASE_URL}/deposits/create`, {
    method: "POST",
    headers: {
      "Accept": "application/json",
      "Content-Type": "application/json",
      "Authorization": `Bearer ${token}`
    },
    body: JSON.stringify({
      user_id: user_id,
      amount: amount,
      date: date,
      mode: mode
    })
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to create deposit");
      return;
    }

    alert(result.message);

    closeAddDepositModal();

    // reload table
    location.reload();
  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}
</script>


<script>
const BASE_URL = "<?= BASE_URL ?>";
const token = localStorage.getItem("auth_token");
const tableBody = document.getElementById("depositTableBody");

let currentOffset = 0;
const limit = 10;

// 🔹 Fetch Deposits (with filters)
function fetchDeposits(filters = {}) {

  fetch(`${BASE_URL}/deposits/fetch_all`, {
    method: "POST",
    headers: {
      "Accept": "application/json",
      "Content-Type": "application/json",
      "Authorization": `Bearer ${token}`
    },
    body: JSON.stringify({
      filters: filters,
      pagination: {
        limit: limit,
        offset: currentOffset
      }
    })
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to fetch deposits");
      return;
    }

    tableBody.innerHTML = "";

    result.data.forEach((item, index) => {

      const row = `
        <tr class="hover:bg-gray-50">
          <td class="border px-4 py-3">${currentOffset + index + 1}</td>
          <td class="border px-4 py-3">${item.user_id}</td>
          <td class="border px-4 py-3">₹${item.amount}</td>
          <td class="border px-4 py-3">${item.date}</td>
          <td class="border px-4 py-3 capitalize">${item.mode}</td>
          <td class="border p-2 space-x-1">
            <button onclick="viewDeposit(${item.id})"
              class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
          </td>
        </tr>
      `;

      tableBody.insertAdjacentHTML("beforeend", row);
    });

  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}

// 🔹 Initial Load
document.addEventListener("DOMContentLoaded", () => {
  fetchDeposits();
});
</script>




<script>
function applyFilter() {

  const filters = {
    min_amount: document.getElementById("filterMinAmount").value || null,
    max_amount: document.getElementById("filterMaxAmount").value || null,
    date: document.getElementById("filterDate").value || null,
    mode: document.getElementById("filterMode").value || null
  };

  currentOffset = 0;
  fetchDeposits(filters);
}

function resetFilter() {

  document.getElementById("filterMinAmount").value = "";
  document.getElementById("filterMaxAmount").value = "";
  document.getElementById("filterDate").value = "";
  document.getElementById("filterMode").value = "";

  currentOffset = 0;
  fetchDeposits();
}
</script>


<script>
function getFilters() {
  return {
    min_amount: document.getElementById("filterMinAmount").value || null,
    max_amount: document.getElementById("filterMaxAmount").value || null,
    date: document.getElementById("filterDate").value || null,
    mode: document.getElementById("filterMode").value || null
  };
}

// 🔹 Auto fetch on change / input
["filterMinAmount", "filterMaxAmount", "filterDate", "filterMode"].forEach(id => {
  document.getElementById(id).addEventListener("input", () => {
    currentOffset = 0;
    fetchDeposits(getFilters());
  });
});

// 🔹 Reset button logic
function resetFilter() {

  document.getElementById("filterMinAmount").value = "";
  document.getElementById("filterMaxAmount").value = "";
  document.getElementById("filterDate").value = "";
  document.getElementById("filterMode").value = "";

  currentOffset = 0;
  fetchDeposits();
}
</script>




  <?php include('footer.php') ?>


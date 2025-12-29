

<?php include('header.php'); include('config.php')  ?>


<div class="mb-4 text-right">
  <button onclick="openAddDepositModal()"
          class="px-4 py-2 bg-green-600 text-white rounded text-sm">
    + Add Deposit
  </button>
</div>



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

        <tbody  id="depositTableBody" class="text-sm text-center">

         

        </tbody>
      </table>

 <!-- VIEW DEPOSIT MODAL -->
<div id="viewDepositModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

  <div class="bg-white rounded-lg w-full max-w-md p-5">

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
      <button onclick="closeDepositModal()"
              class="px-4 py-1 bg-gray-600 text-white rounded">
        Close
      </button>
    </div>

  </div>
</div>

<!-- EDIT DEPOSIT MODAL -->
<div id="editDepositModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

  <div class="bg-white rounded-lg w-full max-w-md p-5">

    <h2 class="text-lg font-semibold mb-4">Edit Deposit</h2>

    <!-- Hidden ID -->
    <input type="hidden" id="e_id">

    <div class="space-y-3 text-sm">
      <input type="number" id="e_user_id"
             class="w-full border px-3 py-2 rounded"
             placeholder="User ID">

      <input type="number" id="e_amount"
             class="w-full border px-3 py-2 rounded"
             placeholder="Amount">

      <input type="date" id="e_date"
             class="w-full border px-3 py-2 rounded">

      <select id="e_mode"
              class="w-full border px-3 py-2 rounded">
        <option value="">Select Mode</option>
        <option value="cash">Cash</option>
        <option value="online">Online</option>
      </select>
    </div>

    <div class="mt-5 text-right space-x-2">
      <button onclick="closeEditDepositModal()"
              class="px-4 py-1 bg-gray-500 text-white rounded">
        Cancel
      </button>
      <button onclick="updateDeposit()"
              class="px-4 py-1 bg-blue-600 text-white rounded">
        Update
      </button>
    </div>

  </div>
</div>



<!-- ADD DEPOSIT MODAL -->
<div id="addDepositModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

  <div class="bg-white rounded-lg w-full max-w-md p-5">

    <h2 class="text-lg font-semibold mb-4">Add Deposit</h2>

    <div class="space-y-3 text-sm">
      <input type="number" id="a_user_id"
             class="w-full border px-3 py-2 rounded"
             placeholder="User ID">

      <input type="number" id="a_amount"
             class="w-full border px-3 py-2 rounded"
             placeholder="Amount">

      <input type="date" id="a_date"
             class="w-full border px-3 py-2 rounded">

      <select id="a_mode"
              class="w-full border px-3 py-2 rounded">
        <option value="">Select Mode</option>
        <option value="cash">Cash</option>
        <option value="online">Online</option>
      </select>
    </div>

    <div class="mt-5 text-right space-x-2">
      <button onclick="closeAddDepositModal()"
              class="px-4 py-1 bg-gray-500 text-white rounded">
        Cancel
      </button>
      <button onclick="saveDeposit()"
              class="px-4 py-1 bg-green-600 text-white rounded">
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

  if (!token) {
    alert("Auth token missing");
    return;
  }

  fetch(`${BASE_URL}/deposits/fetch_all`, {
    method: "GET",
    headers: {
      "Accept": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Failed to load deposits");
      return;
    }

    tableBody.innerHTML = "";

    result.data.forEach((item, index) => {

      const row = `
        <tr class="hover:bg-gray-50">
          <td class="border px-4 py-3">${index + 1}</td>
          <td class="border px-4 py-3">D${item.id}</td>
          <td class="border px-4 py-3">${item.user_id}</td>
          <td class="border px-4 py-3">₹${item.amount}</td>
          <td class="border px-4 py-3">${item.date}</td>
          <td class="border px-4 py-3 capitalize">${item.mode}</td>
          <td class="border p-2 space-x-1">
            <button onclick="viewDeposit(${item.id})"
              class="px-2 py-1 text-xs bg-blue-500 text-white rounded">
              View
            </button>
           <button onclick="openEditDeposit(${item.id})"
              class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">
              Edit
           </button>
           <button onclick="deleteDeposit(${item.id})"
             class="px-2 py-1 text-xs bg-red-500 text-white rounded">
             Delete
           </button>

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
  });
}

function closeDepositModal() {
  document.getElementById("viewDepositModal").classList.add("hidden");
}
</script>

<script>
function openEditDeposit(id) {

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

    document.getElementById("e_id").value = data.id;
    document.getElementById("e_user_id").value = data.user_id;
    document.getElementById("e_amount").value = data.amount;
    document.getElementById("e_date").value = data.date;
    document.getElementById("e_mode").value = data.mode;

    document.getElementById("editDepositModal").classList.remove("hidden");
    document.getElementById("editDepositModal").classList.add("flex");
  });
}

function closeEditDepositModal() {
  document.getElementById("editDepositModal").classList.add("hidden");
}
</script>




<script>
function updateDeposit() {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  const id = document.getElementById("e_id").value;
  const user_id = document.getElementById("e_user_id").value;
  const amount = document.getElementById("e_amount").value;
  const date = document.getElementById("e_date").value;
  const mode = document.getElementById("e_mode").value;

  if (!user_id || !amount || !date || !mode) {
    alert("All fields are required");
    return;
  }

  fetch(`${BASE_URL}/deposits/update/${id}`, {
    method: "PUT",
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
      alert("Update failed");
      return;
    }

    alert(result.message);

    closeEditDepositModal();
    location.reload();
  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}
</script>




<script>
function deleteDeposit(id) {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  if (!token) {
    alert("Token missing");
    return;
  }

  if (!confirm("Are you sure you want to delete this deposit?")) {
    return;
  }

  fetch(`${BASE_URL}/deposits/delete/${id}`, {
    method: "DELETE",
    headers: {
      "Accept": "application/json",
      "Authorization": `Bearer ${token}`
    }
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Delete failed");
      return;
    }

    alert(result.message);

    // Reload table
    location.reload();
  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
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
</script>



<script>
function saveDeposit() {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  const user_id = document.getElementById("a_user_id").value;
  const amount  = document.getElementById("a_amount").value;
  const date    = document.getElementById("a_date").value;
  const mode    = document.getElementById("a_mode").value;

  if (!user_id || !amount || !date || !mode) {
    alert("All fields are required");
    return;
  }
   if (!token) {
    alert("Token missing");
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
    location.reload();
  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}
</script>



  <?php include('footer.php') ?>
<?php include('header.php'); include('config.php') ?>

<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

  <div class="bg-white shadow rounded-lg overflow-x-auto">


  <div class="flex justify-end mb-4">
  <button
    onclick="openAddModal()"
    class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
    + Add Dustbin
  </button>
</div>


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

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">

    <h2 class="text-lg font-semibold mb-4">Edit Dustbin Entry</h2>

    <input type="hidden" id="e_id">

    <div class="space-y-4 text-sm">
      <div>
        <label class="block mb-1 font-medium">User ID</label>
        <input id="e_user_id" type="text" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Date</label>
        <input id="e_date" type="date" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Day Name</label>
        <input id="e_day_name" type="text" class="w-full border rounded px-3 py-2">
      </div>
    </div>

    <div class="mt-6 flex justify-end gap-2">
      <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded">
        Cancel
      </button>
      <button onclick="updateDustbin()" class="px-4 py-2 bg-blue-600 text-white rounded">
        Update
      </button>
    </div>

  </div>
</div>



<!-- ADD MODAL -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">

    <h2 class="text-lg font-semibold mb-4">Add Dustbin Entry</h2>

    <div class="space-y-4 text-sm">
      <div>
        <label class="block mb-1 font-medium">User ID</label>
        <input id="a_user_id" type="text" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 font-medium">Date</label>
        <input id="a_date" type="date" class="w-full border rounded px-3 py-2">
      </div>

      <div>
  <label class="block mb-1 font-medium">Day Name</label>
  <select id="a_day_name" class="w-full border rounded px-3 py-2">
    <option value="">-- Select Day --</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
  </select>
</div>

    </div>

    <div class="mt-6 flex justify-end gap-2">
      <button onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white rounded">
        Cancel
      </button>
      <button onclick="createDustbin()" class="px-4 py-2 bg-green-600 text-white rounded">
        Save
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
           <button onclick="openEditModal(${item.id}, '${item.user_id}', '${item.date}', '${item.day_name}')"
             class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">
              Edit
           </button>

            <button  onclick="deleteDustbin(${item.id})"
              class="px-2 py-1 text-xs bg-red-500 text-white rounded">
              Delete
            </button>

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



<script>
/* OPEN EDIT MODAL */
function openEditModal(id, user_id, date, day_name) {
  document.getElementById("e_id").value = id;
  document.getElementById("e_user_id").value = user_id;
  document.getElementById("e_date").value = date;
  document.getElementById("e_day_name").value = day_name;

  document.getElementById("editModal").classList.remove("hidden");
  document.getElementById("editModal").classList.add("flex");
}

/* CLOSE EDIT MODAL */
function closeEditModal() {
  document.getElementById("editModal").classList.add("hidden");
  document.getElementById("editModal").classList.remove("flex");
}

/* UPDATE API CALL */
function updateDustbin() {

  const BASE_URL = "<?= BASE_URL ?>";
  const token = localStorage.getItem("auth_token");

  const id = document.getElementById("e_id").value;

  const payload = {
    user_id: document.getElementById("e_user_id").value,
    date: document.getElementById("e_date").value,
    day_name: document.getElementById("e_day_name").value
  };

  fetch(`${BASE_URL}/dustbin/update/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${token}`
    },
    body: JSON.stringify(payload)
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Update failed");
      return;
    }

    alert(result.message);

    closeEditModal();

    // Reload table data
    location.reload();
  })
  .catch(err => {
    console.error(err);
    alert("Something went wrong");
  });
}
</script>



<script>
/* OPEN ADD MODAL */
function openAddModal() {
  document.getElementById("a_user_id").value = "";
  document.getElementById("a_date").value = "";
  document.getElementById("a_day_name").value = "";

  document.getElementById("addModal").classList.remove("hidden");
  document.getElementById("addModal").classList.add("flex");
}

/* CLOSE ADD MODAL */
function closeAddModal() {
  document.getElementById("addModal").classList.add("hidden");
  document.getElementById("addModal").classList.remove("flex");
}

/* CREATE DUSTBIN */
function createDustbin() {

  const BASE_URL = "<?= BASE_URL ?>";
  const auth_token = localStorage.getItem("auth_token");

  const payload = {
    user_id: document.getElementById("a_user_id").value,
    date: document.getElementById("a_date").value,
    day_name: document.getElementById("a_day_name").value
  };

  fetch(`${BASE_URL}/dustbin/create`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${auth_token}`
    },
    body: JSON.stringify(payload)
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Creation failed");
      return;
    }

    alert(result.message);

    closeAddModal();

    // Reload table
    location.reload();
  })
  .catch(error => {
    console.error(error);
    alert("Something went wrong");
  });
}
</script>

<script>
/* DELETE DUSTBIN */
function deleteDustbin(id) {

  if (!confirm("Are you sure you want to delete this entry?")) {
    return;
  }

  const BASE_URL = "<?= BASE_URL ?>";
  const auth_token = localStorage.getItem("auth_token");

  fetch(`${BASE_URL}/dustbin/delete/${id}`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${auth_token}`
    }
  })
  .then(res => res.json())
  .then(result => {

    if (!result.status) {
      alert("Delete failed");
      return;
    }

    alert(result.message);

    // Reload table after delete
    location.reload();
  })
  .catch(error => {
    console.error(error);
    alert("Something went wrong");
  });
}
</script>


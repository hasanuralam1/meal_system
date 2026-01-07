<?php include('header.php'); include('config.php')?>



 <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">


    <div class="flex justify-end mb-3">
  <button
    onclick="openAddMealModal()"
    class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
    + Add Meal
  </button>
</div>


<!-- FILTER SECTION -->
<div class="p-4 bg-gray-50 border-b flex flex-wrap gap-4 items-end">

  <!-- User Name -->
  <div>
    <label class="text-xs text-gray-600">User Name</label>
    <input
      type="text"
      id="filterUserName"
      placeholder="Search user"
      class="border px-3 py-2 rounded text-sm w-48"
    />
  </div>

  <!-- Date -->
  <div>
    <label class="text-xs text-gray-600">Date</label>
    <input
      type="date"
      id="filterDate"
      class="border px-3 py-2 rounded text-sm w-48"
    />
  </div>

  <!-- Day -->
  <!-- <div>
    <label class="text-xs text-gray-600">Day</label>
    <select id="filterDay" class="border px-3 py-2 rounded text-sm w-32">
      <option value="">All</option>
      <option value="1">Eat</option>
      <option value="0">Not</option>
    </select>
  </div> -->

  <!-- Night -->
  <!-- <div>
    <label class="text-xs text-gray-600">Night</label>
    <select id="filterNight" class="border px-3 py-2 rounded text-sm w-32">
      <option value="">All</option>
      <option value="1">Eat</option>
      <option value="0">Not</option>
    </select>
  </div> -->

  <!-- Reset Button -->
  <div>
    <button
      onclick="resetFilters()"
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
            <th class="border px-4 py-3">ID</th>
            <th class="border px-4 py-3">User ID</th>
            <th class="border px-4 py-3">user name</th>
            <th class="border px-4 py-3">Date</th>
            <th class="border px-4 py-3">Day</th>
            <th class="border px-4 py-3">Night</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

        <tbody id="userMealTableBody"  class="text-sm text-center">

         

        </tbody>
      </table>

    </div>
  </main>



  <!-- VIEW USER MEAL MODAL -->
<div id="viewMealModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
    
    <h2 class="text-lg font-semibold mb-4">User Meal Details</h2>

    <div class="space-y-2 text-sm">
      <p><strong>ID:</strong> <span id="vm_id"></span></p>
      <p><strong>User ID:</strong> <span id="vm_user_id"></span></p>
      <p><strong>User Name:</strong> <span id="vm_user_name"></span></p>
      <p><strong>Date:</strong> <span id="vm_date"></span></p>
      <p><strong>Day:</strong> <span id="vm_day"></span></p>
      <p><strong>Night:</strong> <span id="vm_night"></span></p>
      <p><strong>Email:</strong> <span id="vm_email"></span></p>
      <p><strong>Phone:</strong> <span id="vm_phone"></span></p>
      <p><strong>Role:</strong> <span id="vm_role"></span></p>
    </div>

    <div class="mt-5 text-right">
      <button onclick="closeViewModal()" class="px-4 py-2 bg-gray-600 text-white rounded text-sm">
        Close
      </button>
    </div>
  </div>
</div>




<!-- ADD USER MEAL MODAL -->
<div id="addMealModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">

    <h2 class="text-lg font-semibold mb-4">Add User Meal</h2>

    <div class="space-y-3 text-sm">
      <input id="am_user_id" type="number" placeholder="User ID"
        class="w-full border px-3 py-2 rounded">

      <input id="am_user_name" type="text" placeholder="User Name"
        class="w-full border px-3 py-2 rounded">

      <input id="am_date" type="date"
        class="w-full border px-3 py-2 rounded">

      <select id="am_day" class="w-full border px-3 py-2 rounded">
        <option value="">day</option>
        <option value="eat">Eat</option>
        <option value="not">Not</option>
      </select>
      <select id="am_night" class="w-full border px-3 py-2 rounded">
        <option value="">night</option>
        <option value="eat">Eat</option>
        <option value="not">Not</option>
      </select>
    </div>

    <div class="mt-5 flex justify-end gap-2">
      <button onclick="closeAddMealModal()"
        class="px-4 py-2 bg-gray-500 text-white rounded text-sm">
        Cancel
      </button>

      <button onclick="submitAddMeal()"
        class="px-4 py-2 bg-green-600 text-white rounded text-sm">
        Save
      </button>
    </div>

  </div>
</div>



<!-- EDIT USER MEAL MODAL -->
<div id="editMealModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">

    <h2 class="text-lg font-semibold mb-4">Edit User Meal</h2>

    <!-- hidden id -->
    <input type="hidden" id="em_id">

    <div class="space-y-3 text-sm">
      <input id="em_user_id" type="number" placeholder="User ID"
        class="w-full border px-3 py-2 rounded">

      <input id="em_user_name" type="text" placeholder="User Name"
        class="w-full border px-3 py-2 rounded">

      <input id="em_date" type="date"
        class="w-full border px-3 py-2 rounded">

      <select id="em_day" class="w-full border px-3 py-2 rounded">
        <option value="">Day</option>
        <option value="eat">Eat</option>
        <option value="not">Not</option>
      </select>

      <select id="em_night" class="w-full border px-3 py-2 rounded">
        <option value="">Night</option>
        <option value="eat">Eat</option>
        <option value="not">Not</option>
      </select>
    </div>

    <div class="mt-5 flex justify-end gap-2">
      <button onclick="closeEditMealModal()"
        class="px-4 py-2 bg-gray-500 text-white rounded text-sm">
        Cancel
      </button>

      <button onclick="submitEditMeal()"
        class="px-4 py-2 bg-yellow-600 text-white rounded text-sm">
        Update
      </button>
    </div>

  </div>
</div>



<script>
  document.getElementById("filterUserName").addEventListener("input", autoFilter);
  document.getElementById("filterDate").addEventListener("change", autoFilter);
  // document.getElementById("filterDay").addEventListener("change", autoFilter);
  // document.getElementById("filterNight").addEventListener("change", autoFilter);

  function autoFilter() {
    offset = 0; // reset pagination
    fetchUserMeals();
  }
</script>

<script>
  function resetFilters() {
    document.getElementById("filterUserName").value = "";
    document.getElementById("filterDate").value = "";
    // document.getElementById("filterDay").value = "";
    // document.getElementById("filterNight").value = "";

    offset = 0;
    fetchUserMeals();
  }
</script>


  <script>
  // 1. Get token from localStorage
  const auth_token = localStorage.getItem("auth_token");

  

  // 3. Fetch user meals
  let limit = 10;
  let offset = 0;

  async function fetchUserMeals() {
    const BASE_URL = "<?= BASE_URL ?>";

    const payload = {
      user_name: document.getElementById("filterUserName").value,
      date: document.getElementById("filterDate").value,
      // day: document.getElementById("filterDay").value,
      // night: document.getElementById("filterNight").value,
      limit: limit,
      offset: offset
    };

    try {
      const response = await fetch(`${BASE_URL}/user_meal/fetch_all`, {
        method: "POST",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify(payload)
      });

      const result = await response.json();

      if (result.status) {
        renderUserMeals(result.data);
      } else {
        alert("Failed to fetch data");
      }
    } catch (error) {
      console.error("Fetch Error:", error);
    }
  }



  // 4. Render table rows
  function renderUserMeals(data) {
    const tbody = document.getElementById("userMealTableBody");
    tbody.innerHTML = "";

    data.forEach((item, index) => {
      const row = `
        <tr class="hover:bg-gray-50">
          <td class="border px-4 py-3">${index + 1}</td>
          <td class="border px-4 py-3">${item.id}</td>
          <td class="border px-4 py-3">${item.user_id}</td>
          <td class="border px-4 py-3">${item.user_name}</td>
          <td class="border px-4 py-3">${item.date}</td>
          <td class="border px-4 py-3 capitalize">${item.day}</td>
           <td class="border px-4 py-3 capitalize">${item.night}</td>
          <td class="border p-2 space-x-1">
            <button onclick="viewMeal(${item.id})" class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
           <button onclick="openEditMealModal(${item.id})" class="px-2 py-1 text-xs bg-yellow-500 text-white rounded"> Edit</button>
           <button  onclick="deleteMeal(${item.id})" class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>

          </td>
        </tr>
      `;
      tbody.insertAdjacentHTML("beforeend", row);
    });
  }

  // 5. Call API on page load
  fetchUserMeals();
</script>



<script>
  const BASE_URL = "<?= BASE_URL ?>";

  // Open modal
  function openViewModal() {
    document.getElementById("viewMealModal").classList.remove("hidden");
    document.getElementById("viewMealModal").classList.add("flex");
  }

  // Close modal
  function closeViewModal() {
    document.getElementById("viewMealModal").classList.add("hidden");
  }

  // Fetch single meal
  async function viewMeal(id) {
    try {
      const response = await fetch(`${BASE_URL}/user_meal/fetch/${id}`, {
        method: "GET",
        headers: {
         "Authorization": `Bearer ${auth_token}`,
                    "Accept": "application/json"
        }
      });

      const result = await response.json();

      if (result.status) {
        const d = result.data;

        document.getElementById("vm_id").innerText = d.id;
        document.getElementById("vm_user_id").innerText = d.user_id;
        document.getElementById("vm_user_name").innerText = d.user_name;
        document.getElementById("vm_date").innerText = d.date;
        document.getElementById("vm_day").innerText = d.day;
        document.getElementById("vm_night").innerText = d.night;
        document.getElementById("vm_email").innerText = d.user.email;
        document.getElementById("vm_phone").innerText = d.user.phone;
        document.getElementById("vm_role").innerText = d.user.role;

        openViewModal();
      } else {
        alert("Failed to fetch meal details");
      }
    } catch (error) {
      console.error("View API Error:", error);
    }
  }
</script>


<script>
 

  function openAddMealModal() {
    document.getElementById("addMealModal").classList.remove("hidden");
    document.getElementById("addMealModal").classList.add("flex");
  }

  function closeAddMealModal() {
    document.getElementById("addMealModal").classList.add("hidden");
  }

  async function submitAddMeal() {
    const payload = {
      user_id: document.getElementById("am_user_id").value,
      user_name: document.getElementById("am_user_name").value,
      date: document.getElementById("am_date").value,
      day: document.getElementById("am_day").value,
      night: document.getElementById("am_night").value
    };

    if (!payload.user_id || !payload.user_name || !payload.date || !payload.day  || !payload.night) {
      alert("All fields are required");
      return;
    }

    try {
      const response = await fetch(`${BASE_URL}/user_meal/create`, {
        method: "POST",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify(payload)
      });

      const result = await response.json();

      if (result.status) {
        closeAddMealModal();
        fetchUserMeals(); // refresh table
        alert(result.message);
      } else {
        alert("Failed to add meal");
      }
    } catch (error) {
      console.error("Create Meal Error:", error);
    }
  }
</script>




<script>
  // Open edit modal + load data
  async function openEditMealModal(id) {
    try {
      const response = await fetch(`${BASE_URL}/user_meal/fetch/${id}`, {
        method: "GET",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
          "Accept": "application/json"
        }
      });

      const result = await response.json();

      if (result.status) {
        const d = result.data;

        document.getElementById("em_id").value = d.id;
        document.getElementById("em_user_id").value = d.user_id;
        document.getElementById("em_user_name").value = d.user_name;
        document.getElementById("em_date").value = d.date;
        document.getElementById("em_day").value = d.day;
        document.getElementById("em_night").value = d.night;

        document.getElementById("editMealModal").classList.remove("hidden");
        document.getElementById("editMealModal").classList.add("flex");
      } else {
        alert("Failed to load meal data");
      }
    } catch (error) {
      console.error("Edit Fetch Error:", error);
    }
  }

  function closeEditMealModal() {
    document.getElementById("editMealModal").classList.add("hidden");
  }

  // Submit update
  async function submitEditMeal() {
    const id = document.getElementById("em_id").value;

    const payload = {
      user_id: document.getElementById("em_user_id").value,
      user_name: document.getElementById("em_user_name").value,
      date: document.getElementById("em_date").value,
      day: document.getElementById("em_day").value,
      night: document.getElementById("em_night").value
    };

    if (!payload.user_id || !payload.user_name || !payload.date || !payload.day) {
      alert("All fields are required");
      return;
    }

    try {
      const response = await fetch(`${BASE_URL}/user_meal/update/${id}`, {
        method: "PUT",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify(payload)
      });

      const result = await response.json();

      if (result.status) {
        closeEditMealModal();
        fetchUserMeals();
        alert(result.message);
      } else {
        alert("Update failed");
      }
    } catch (error) {
      console.error("Update Error:", error);
    }
  }
</script>



<script>
  async function deleteMeal(id) {
    if (!confirm("Are you sure you want to delete this meal?")) {
      return;
    }

    try {
      const response = await fetch(`${BASE_URL}/user_meal/delete/${id}`, {
        method: "DELETE",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
          "Accept": "application/json"
        }
      });

      const result = await response.json();

      if (result.status) {
        alert(result.message);
        fetchUserMeals(); // refresh table
      } else {
        alert("Failed to delete meal");
      }
    } catch (error) {
      console.error("Delete Error:", error);
    }
  }
</script>




<?php include('footer.php') ?>
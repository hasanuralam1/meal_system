<?php include('header.php'); include('config/config.php')?>



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








  <script>
  // 1. Get token from localStorage
  const auth_token = localStorage.getItem("auth_token");

  

  // 3. Fetch user meals
  async function fetchUserMeals() {
     const BASE_URL = "<?= BASE_URL ?>";
    try {
      const response = await fetch(`${BASE_URL}/user_meal/fetch_all`, {
        method: "GET",
        headers: {
          "Authorization": `Bearer ${auth_token}`,
                    "Accept": "application/json"
        }
      });

      const result = await response.json();

      if (result.status) {
        renderUserMeals(result.data);
      } else {
        alert("Failed to fetch data");
      }
    } catch (error) {
      console.error("Error:", error);
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
            <button 
  onclick="viewMeal(${item.id})"
  class="px-2 py-1 text-xs bg-blue-500 text-white rounded">
  View
</button>
            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
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





<?php include('footer.php') ?>
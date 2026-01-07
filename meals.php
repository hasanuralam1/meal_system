

<?php include('header.php'); include('config/config.php') ?>


  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">

    <div class="flex justify-end mb-3">
  <!-- <button onclick="openAddMealModal()"
    class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">
    + Add Meal
  </button> -->
</div>



<!-- FILTER SECTION -->
<div class="p-4 bg-gray-50 border-b flex flex-wrap gap-4 items-end">

  <!-- Meal Name -->
  <div>
    <label class="text-xs text-gray-600">Meal Name</label>
    <input
      type="text"
      id="filterMealName"
      placeholder="Search meal"
      class="border px-3 py-2 rounded text-sm w-40"
    />
  </div>

  <!-- Date -->
  <div>
    <label class="text-xs text-gray-600">Date</label>
    <input
      type="date"
      id="filterDate"
      class="border px-3 py-2 rounded text-sm w-40"
    />
  </div>

  <!-- Day Name -->
  <div>
    <label class="text-xs text-gray-600">Day Name</label>
    <select
      id="filterDayName"
      class="border px-3 py-2 rounded text-sm w-40"
    >
      <option value="">All</option>
      <option value="sunday">Sunday</option>
      <option value="monday">Monday</option>
      <option value="tuesday">Tuesday</option>
      <option value="wednesday">Wednesday</option>
      <option value="thursday">Thursday</option>
      <option value="friday">Friday</option>
      <option value="saturday">Saturday</option>
    </select>
  </div>

  <!-- Buttons -->
  <div class="flex gap-2">
    <!-- <button
      onclick="applyMealFilter()"
      class="px-4 py-2 bg-blue-600 text-white rounded text-sm">
      Apply
    </button> -->

    <button
      onclick="resetMealFilter()"
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
            <th class="border px-4 py-3">Meal Name</th>
            <th class="bborder px-4 py-3">Date</th>
            <th class="border px-4 py-3">Day</th>
            <th class="border px-4 py-3">Night</th>
            <th class="border px-4 py-3">Day Name</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

      <tbody id="mealTableBody" class="text-sm text-center">
    <tr>
        <td colspan="8" class="py-6 text-gray-500">Loading meals...</td>
    </tr>
     </tbody>

      </table>

    </div>
    <!-- VIEW MEAL MODAL -->
<div id="viewMealModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">

    <h3 class="text-lg font-semibold mb-4">Meal Details</h3>

    <div class="space-y-2 text-sm">
      <!-- <p><strong>ID:</strong> <span id="v_id"></span></p> -->
      <p><strong>Meal Name:</strong> <span id="v_meal_name"></span></p>
      <p><strong>Date:</strong> <span id="v_date"></span></p>
      <p><strong>Day:</strong> <span id="v_day"></span></p>
      <p><strong>Night:</strong> <span id="v_night"></span></p>
      <p><strong>Day Name:</strong> <span id="v_day_name"></span></p>
    </div>

    <button onclick="closeMealModal()"
      class="absolute top-2 right-2 text-gray-500 hover:text-black">
      ✕
    </button>
  </div>
</div>

  </main>

<!-- ADD MEAL MODAL -->
<div id="addMealModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">

    <h3 class="text-lg font-semibold mb-4">Add Meal</h3>

    <div class="space-y-3 text-sm">

      <input id="a_meal_name" type="text" placeholder="Meal Name"
        class="w-full border px-3 py-2 rounded">

      <input id="a_date" type="date"
        class="w-full border px-3 py-2 rounded">

      <select id="a_day" class="w-full border px-3 py-2 rounded">
        <option value="">Day</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

      <select id="a_night" class="w-full border px-3 py-2 rounded">
        <option value="">Night</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

  <select id="a_day_name" class="w-full border px-3 py-2 rounded">
          <option value="">Select Day</option>
          <option value="sunday">Sunday</option>
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thursday">Thursday</option>
          <option value="friday">Friday</option>
          <option value="saturday">Saturday</option>
</select>


    </div>

   


  <script>
    
    document.addEventListener("DOMContentLoaded", fetchMeals);
    async function viewMeal(mealId) {
    const token = localStorage.getItem("auth_token");

    if (!token) {
        alert("Unauthorized");
        return;
    }

    try {
        const res = await fetch(`${BASE_URL}/meals/fetch/${mealId}`, {
            method: "GET",
            headers: {
                "Authorization": `Bearer ${token}`,
                "Accept": "application/json"
            }
        });

        const result = await res.json();
        console.log("VIEW MEAL RESPONSE:", result);

        if (!result.status) {
            alert("Failed to fetch meal");
            return;
        }

        const meal = result.data;

        // Fill modal
        // document.getElementById("v_id").textContent = meal.id;
        document.getElementById("v_meal_name").textContent = meal.meal_name;
        document.getElementById("v_date").textContent = meal.date;
        document.getElementById("v_day").textContent = meal.day;
        document.getElementById("v_night").textContent = meal.night;
        document.getElementById("v_day_name").textContent = meal.day_name;

        // Show modal
        document.getElementById("viewMealModal").classList.remove("hidden");
        document.getElementById("viewMealModal").classList.add("flex");

    } catch (error) {
        console.error(error);
        alert("Server error");
    }
}

function closeMealModal() {
    const modal = document.getElementById("viewMealModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
    const BASE_URL = "<?= BASE_URL ?>";
    let currentOffset = 0;
    const limit = 5;

   
async function fetchMeals() {
    const token = localStorage.getItem("auth_token");
    const tbody = document.getElementById("mealTableBody");

    if (!token) {
        tbody.innerHTML = `
            <tr>
                <td colspan="8" class="py-6 text-red-500">Unauthorized</td>
            </tr>`;
        return;
    }

    const payload = {
        meal_name: document.getElementById("filterMealName")?.value || "",
        date: document.getElementById("filterDate")?.value || "",
        day_name: document.getElementById("filterDayName")?.value || "",
        limit: limit,
        offset: currentOffset
    };

    try {
        const res = await fetch(`${BASE_URL}/meals/fetch_all`, {
            method: "POST",
            headers: {
                "Authorization": `Bearer ${token}`,
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(payload)
        });

        const result = await res.json();
        console.log("MEALS FILTER RESPONSE:", result);

        if (!result.status || !result.data.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="py-6 text-gray-500">No meals found</td>
                </tr>`;
            return;
        }

        tbody.innerHTML = "";

        result.data.forEach((meal, index) => {
            tbody.innerHTML += `
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-3">${currentOffset + index + 1}</td>
                    <td class="border px-4 py-3">${meal.meal_name}</td>
                    <td class="border px-4 py-3">${meal.date}</td>
                    <td class="border px-4 py-3">${meal.day}</td>
                    <td class="border px-4 py-3">${meal.night}</td>
                    <td class="border px-4 py-3">${meal.day_name}</td>
                    <td class="border p-2 space-x-1">
                        <button onclick="viewMeal(${meal.id})"
                          class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
                        <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                        <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
                    </td>
                </tr>
            `;
        });

    } catch (error) {
        console.error(error);
        tbody.innerHTML = `
            <tr>
                <td colspan="8" class="py-6 text-red-500">Server error</td>
            </tr>`;
    }
}
</script>


<script>
let filterTimeout = null;

// Meal name auto-search (typing)
document.getElementById("filterMealName").addEventListener("input", function () {
    clearTimeout(filterTimeout);
    filterTimeout = setTimeout(() => {
        currentOffset = 0;
        fetchMeals();
    }, 400);
});

// Date auto-filter
document.getElementById("filterDate").addEventListener("change", function () {
    currentOffset = 0;
    fetchMeals();
});

// Day name auto-filter
document.getElementById("filterDayName").addEventListener("change", function () {
    currentOffset = 0;
    fetchMeals();
});
</script>



<script>
function applyMealFilter() {
    currentOffset = 0;
    fetchMeals();
}

function resetMealFilter() {
    document.getElementById("filterMealName").value = "";
    document.getElementById("filterDate").value = "";
    document.getElementById("filterDayName").value = "";
    currentOffset = 0;
    fetchMeals();
}
</script>



<script>
function openAddMealModal() {
  document.getElementById("addMealModal").classList.remove("hidden");
  document.getElementById("addMealModal").classList.add("flex");
}

function closeAddMealModal() {
  const modal = document.getElementById("addMealModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

async function createMeal() {
  const token = localStorage.getItem("auth_token");

  const payload = {
    meal_name: document.getElementById("a_meal_name").value,
    date: document.getElementById("a_date").value,
    day: document.getElementById("a_day").value,
    night: document.getElementById("a_night").value,
    day_name: document.getElementById("a_day_name").value
  };

  if (!payload.meal_name || !payload.date) {
    alert("Meal name and date are required");
    return;
  }

  try {
    const res = await fetch(`${BASE_URL}/meals/create`, {
      method: "POST",
      headers: {
        "Authorization": `Bearer ${token}`,
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: JSON.stringify(payload)
    });

    const result = await res.json();
    console.log("CREATE MEAL RESPONSE:", result);

    if (result.status) {
      closeAddMealModal();
      fetchMeals(); // reload table
    } else {
      alert(result.message || "Failed to create meal");
    }

  } catch (err) {
    console.error(err);
    alert("Server error");
  }
}
</script>

<script>
document.getElementById("a_date").addEventListener("change", function () {
  const date = new Date(this.value);
  if (!isNaN(date)) {
    const days = ["sunday","monday","tuesday","wednesday","thursday","friday","saturday"];
    document.getElementById("a_day_name").value = days[date.getDay()];
  }
});
</script>

  
  <!-- FOOTER -->
 <?php include('footer.php') ?>



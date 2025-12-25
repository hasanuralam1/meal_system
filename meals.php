

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
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", fetchMeals);
    const BASE_URL = "<?= BASE_URL ?>";

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

        try {
            const res = await fetch(`${BASE_URL}/meals/fetch_all`, {
                method: "GET",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json"
                }
            });

            const result = await res.json();
            console.log("MEALS API RESPONSE:", result);

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
                        <td class="border px-4 py-3">${index + 1}</td>
                        <td class="border px-4 py-3">${meal.id}</td>
                        <td class="border px-4 py-3">${meal.meal_name}</td>
                        <td class="border px-4 py-3">${meal.date}</td>
                        <td class="border px-4 py-3">${meal.day}</td>
                        <td class="border px-4 py-3">${meal.night}</td>
                        <td class="border px-4 py-3">${meal.day_name}</td>
                        <td class="border p-2 space-x-1">
                            <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>
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

  
  <!-- FOOTER -->
 <?php include('footer.php') ?>
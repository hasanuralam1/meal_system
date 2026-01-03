
<?php include('header.php'); include('config.php') ?>
 

  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

    <div class="bg-white shadow rounded-lg overflow-x-auto">

      <!-- TABLE -->
      <table class="w-full border-collapse">
        <table class="w-full min-w-[900px] text-sm text-center border-collapse">
          <thead class="bg-gray-200 text-gray-700">
            <th class="border px-4 py-3">SL</th>
            <th class="border px-4 py-3">ID</th>
            <th class="border px-4 py-3">Name</th>
            <th class="border px-4 py-3">Email</th>
            <th class="border px-4 py-3">Phone</th>
            <th class="border px-4 py-3">Status</th>
            <th class="border px-4 py-3">Role</th>
            <th class="border px-4 py-3">Action</th>
            </tr>
          </thead>

          <tbody  id="userTableBody" class="text-sm text-center">

            
          </tbody>
        </table>

    </div>
  </main>



 <script>
const BASE_URL = "<?= BASE_URL ?>";

document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
});

async function fetchUsers() {
    const auth_token = localStorage.getItem("auth_token");
    const tbody = document.getElementById("userTableBody");

    try {
        const response = await fetch(`${BASE_URL}/users`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${auth_token}`
            }
        });

        const res = await response.json();

        if (res.status && Array.isArray(res.data)) {
            tbody.innerHTML = "";

            res.data.forEach((user, index) => {
                const statusBadge =
                    user.status === "active"
                        ? `<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Active</span>`
                        : `<span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Inactive</span>`;

                tbody.innerHTML += `
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3">${index + 1}</td>
                        <td class="border px-4 py-3">${user.id}</td>
                        <td class="border px-4 py-3">${user.name}</td>
                        <td class="border px-4 py-3">${user.email}</td>
                        <td class="border px-4 py-3">${user.phone}</td>
                        <td class="border px-4 py-3">${statusBadge}</td>
                        <td class="border p-2">${user.role}</td>
                        <td class="border p-2 space-x-1">
                            <button onclick="viewUser(${user.id})"
                                class="px-2 py-1 text-xs bg-blue-500 text-white rounded">
                                View
                            </button>
                            <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">
                                Edit
                            </button>
                            <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
            });
        }
    } catch (error) {
        console.error("Error fetching users:", error);
    }
}
</script>

 

  <!-- FOOTER -->
 <?php include('footer.php') ?>


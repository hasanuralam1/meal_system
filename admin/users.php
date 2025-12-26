
<?php include('header.php') ?>
 

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

          <tbody class="text-sm text-center">

            <!-- Row 1 -->
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-3">1</td>
              <td class="border px-4 py-3">1</td>
              <td class="border px-4 py-3">Hasanur Alam</td>
              <td class="border px-4 py-3">hasanur@mail.com</td>
              <td class="border px-4 py-3">01700000001</td>
              <td class="border px-4 py-3">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Active</span>
              </td>
              <td class="border p-2">User</td>
              <td class="border p-2 space-x-1">
                <button onclick="viewUser(1)"class="px-2 py-1 text-xs bg-blue-500 text-white rounded">View</button>

                <button class="px-2 py-1 text-xs bg-yellow-500 text-white rounded">Edit</button>
                <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>

    </div>
  </main>

  <script>
const BASE_URL = "<?= BASE_URL ?>";

async function viewUser(userId) {
  const token = localStorage.getItem("auth_token");

  if (!token) {
    alert("Unauthorized");
    return;
  }

  try {
    const res = await fetch(`${BASE_URL}/users/${userId}`, {
      method: "GET",
      headers: {
        "Authorization": `Bearer ${token}`,
        "Accept": "application/json"
      }
    });

    const result = await res.json();
    console.log("USER VIEW RESPONSE:", result);

    if (!result.status) {
      alert("Failed to load user");
      return;
    }

    const user = result.data;

    document.getElementById("u_id").textContent = user.id;
    document.getElementById("u_name").textContent = user.name;
    document.getElementById("u_email").textContent = user.email;
    document.getElementById("u_phone").textContent = user.phone;
    document.getElementById("u_status").textContent = user.status;
    document.getElementById("u_role").textContent = user.role;

    // show modal
    const modal = document.getElementById("viewUserModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");

  } catch (error) {
    console.error(error);
    alert("Server error");
  }
}

function closeUserModal() {
  const modal = document.getElementById("viewUserModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

</script>

  <!-- FOOTER -->
 <?php include('footer.php') ?>


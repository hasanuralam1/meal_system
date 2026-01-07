

<?php include('header.php'); include('config/config.php') ?>


  <!-- MAIN CONTENT -->
  <main class="max-w-7xl mx-auto w-full px-4 py-6 flex-1 space-y-6">

  <div class="flex justify-end mb-4">
  <button
    id="openAddModal"
    class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
    + Add Marketing
  </button>
</div>




<!-- FILTER SECTION -->
<div class="bg-white p-4 rounded shadow mb-4 flex flex-wrap gap-4 items-end">

  <div>
    <label class="text-xs text-gray-600">Market</label>
    <input
      type="text"
      id="filterMarket"
      placeholder="Market name"
      class="border px-3 py-2 rounded text-sm w-48"
    />
  </div>

  <div>
    <label class="text-xs text-gray-600">Min Price</label>
    <input
      type="number"
      id="filterPriceMin"
      class="border px-3 py-2 rounded text-sm w-32"
    />
  </div>

  <div>
    <label class="text-xs text-gray-600">Max Price</label>
    <input
      type="number"
      id="filterPriceMax"
      class="border px-3 py-2 rounded text-sm w-32"
    />
  </div>

  <div>
    <label class="text-xs text-gray-600">Date</label>
    <input
      type="date"
      id="filterDate"
      class="border px-3 py-2 rounded text-sm w-40"
    />
  </div>

  <!-- ONLY RESET BUTTON -->
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
            <!-- <th class="border px-4 py-3">ID</th> -->
            <th class="border px-4 py-3">User ID</th>
            <th class="border px-4 py-3">Market</th>
            <th class="border px-4 py-3">Price</th>
            <th class="border px-4 py-3">Date</th>
            <th class="border px-4 py-3">Action</th>
          </tr>
        </thead>

        <tbody class="text-sm text-center" id="marketingTableBody">

          

          

        </tbody>
      </table>

    </div>

    <!-- ADD MARKETING MODAL -->
<div id="addMarketingModal"
     class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">

  <div class="bg-white rounded-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Add Marketing</h2>

    <form id="addMarketingForm" class="space-y-4">

      <div>
        <label class="block text-sm mb-1">User ID</label>
        <input type="number" id="user_id" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Market</label>
        <input type="text" id="market" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Price</label>
        <input type="number" id="price" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Date</label>
        <input type="date" id="date" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div class="flex justify-end gap-2 pt-3">
        <button type="button" id="closeAddModal"
                class="px-4 py-2 bg-gray-400 text-white rounded">
          Cancel
        </button>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded">
          Save
        </button>
      </div>

    </form>
  </div>
</div>
<!-- VIEW MARKETING MODAL -->
<div id="viewMarketingModal"
     class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">

  <div class="bg-white rounded-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Marketing Details</h2>

    <div class="space-y-2 text-sm">
      <!-- <p><strong>ID:</strong> <span id="v_id"></span></p> -->
      <p><strong>User:</strong> <span id="v_user"></span></p>
      <p><strong>Market:</strong> <span id="v_market"></span></p>
      <p><strong>Price:</strong> ₹<span id="v_price"></span></p>
      <p><strong>Date:</strong> <span id="v_date"></span></p>
    </div>

    <div class="flex justify-end pt-4">
      <button
        onclick="closeViewModal()"
        class="px-4 py-2 bg-gray-500 text-white rounded">
        Close
      </button>
    </div>
  </div>
</div>


<!-- EDIT MARKETING MODAL -->
<div id="editMarketingModal"
     class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">

  <div class="bg-white rounded-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Edit Marketing</h2>

    <form id="editMarketingForm" class="space-y-4">

      <input type="hidden" id="edit_id">

      <div>
        <label class="block text-sm mb-1">User ID</label>
        <input type="number" id="edit_user_id" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Market</label>
        <input type="text" id="edit_market" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Price</label>
        <input type="number" id="edit_price" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block text-sm mb-1">Date</label>
        <input type="date" id="edit_date" required
               class="w-full border px-3 py-2 rounded">
      </div>

      <div class="flex justify-end gap-2 pt-3">
        <button type="button"
                onclick="closeEditModal()"
                class="px-4 py-2 bg-gray-400 text-white rounded">
          Cancel
        </button>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded">
          Update
        </button>
      </div>

    </form>
  </div>
</div>


  </main>


  <script>
document.addEventListener("DOMContentLoaded", function () {

    const BASE_URL = "<?= BASE_URL ?>";// e.g. https://example.com/api
    const authToken = localStorage.getItem("auth_token");
    const tableBody = document.getElementById("marketingTableBody");

    if (!authToken) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="7" class="py-4 text-red-500">
                    Authentication token missing. Please login again.
                </td>
            </tr>`;
        return;
    }

    let limit = 10;
let offset = 0;

function fetchMarketing() {

    const payload = {
        market: document.getElementById("filterMarket").value || null,
        price_min: document.getElementById("filterPriceMin").value || null,
        price_max: document.getElementById("filterPriceMax").value || null,
        date: document.getElementById("filterDate").value || null,
        limit: limit,
        offset: offset
    };

    fetch(`${BASE_URL}/marketing/fetch_all`, {
        method: "POST",
        headers: {
            "Authorization": `Bearer ${authToken}`,
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(result => {

        if (!result.status || result.data.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="py-4 text-gray-500">
                        No marketing data found
                    </td>
                </tr>`;
            return;
        }

        tableBody.innerHTML = "";

        result.data.forEach((item, index) => {
            tableBody.innerHTML += `
                <tr>
                    <td class="border px-4 py-3">${offset + index + 1}</td>
                    <td class="border px-4 py-3">${item.user_id}</td>
                    <td class="border px-4 py-3">${item.market}</td>
                    <td class="border px-4 py-3">₹${item.price}</td>
                    <td class="border px-4 py-3">${item.date}</td>
                    
                    <td class="border p-2 space-x-1">
    <button
      class="px-2 py-1 text-xs bg-blue-500 text-white rounded"
      onclick="viewMarketing(${item.id})">
      View
    </button>

    <button
      class="px-2 py-1 text-xs bg-yellow-500 text-white rounded"
      onclick="openEditMarketing(
        ${item.id},
        '${item.market}',
        '${item.price}',
        '${item.date}',
        '${item.user_id}'
      )">
      Edit
    </button>

    <button
      class="px-2 py-1 text-xs bg-red-500 text-white rounded"
      onclick="deleteMarketing(${item.id})">
      Delete
    </button>
</td>

                </tr>
            `;
        });
    });
}

// AUTO FETCH ON CHANGE
["filterMarket","filterPriceMin","filterPriceMax","filterDate"]
.forEach(id => {
    document.getElementById(id).addEventListener("input", () => {
        offset = 0;
        fetchMarketing();
    });
});

// RESET
window.resetFilters = function () {
    document.getElementById("filterMarket").value = "";
    document.getElementById("filterPriceMin").value = "";
    document.getElementById("filterPriceMax").value = "";
    document.getElementById("filterDate").value = "";
    offset = 0;
    fetchMarketing();
};

// INITIAL LOAD
fetchMarketing();


})
</script>

<script>
const addModal = document.getElementById("addMarketingModal");
const openBtn = document.getElementById("openAddModal");
const closeBtn = document.getElementById("closeAddModal");
const addForm = document.getElementById("addMarketingForm");

// Open modal
openBtn.onclick = () => {
    addModal.classList.remove("hidden");
    addModal.classList.add("flex");
};

// Close modal
closeBtn.onclick = () => {
    addModal.classList.add("hidden");
    addModal.classList.remove("flex");
};

// Submit form
addForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const authToken = localStorage.getItem("auth_token");

    if (!authToken) {
        alert("Authentication token missing");
        return;
    }

    // Use FormData (important to avoid 422)
    const formData = new FormData();
    formData.append("user_id", document.getElementById("user_id").value);
    formData.append("market", document.getElementById("market").value);
    formData.append("price", document.getElementById("price").value);
    formData.append("date", document.getElementById("date").value);

    fetch(`<?= BASE_URL ?>/marketing/create`, {
        method: "POST",
        headers: {
    "Authorization": `Bearer ${authToken}`,
    "Accept": "application/json"
},
        body: formData
    })
    .then(res => res.json())
    .then(result => {
        if (result.status) {
            alert(result.message);
            addForm.reset();
            addModal.classList.add("hidden");
            addModal.classList.remove("flex");
            location.reload(); // reload table
        } else {
            alert("Failed to add marketing");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Something went wrong");
    });
});
</script>


<script>
function viewMarketing(id) {

    const authToken = localStorage.getItem("auth_token");

    if (!authToken) {
        alert("Authentication token missing");
        return;
    }

    fetch(`<?= BASE_URL ?>/marketing/fetch/${id}`, {
        method: "GET",
        headers: {
        "Authorization": `Bearer ${authToken}`,
        "Accept": "application/json"
    }
    })
    .then(res => res.json())
    .then(result => {

        if (!result.status) {
            alert("Failed to fetch data");
            return;
        }

        const data = result.data;

        // document.getElementById("v_id").innerText = data.id;
        document.getElementById("v_user").innerText = data.user.name;
        document.getElementById("v_market").innerText = data.market;
        document.getElementById("v_price").innerText = data.price;
        document.getElementById("v_date").innerText = data.date;

        const modal = document.getElementById("viewMarketingModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    })
    .catch(err => {
        console.error(err);
        alert("Something went wrong");
    });
}

function closeViewModal() {
    const modal = document.getElementById("viewMarketingModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
</script>



<script>
function openEditMarketing(id, market, price, date, user_id) {

    document.getElementById("edit_id").value = id;
    document.getElementById("edit_market").value = market;
    document.getElementById("edit_price").value = price;
    document.getElementById("edit_date").value = date;
    document.getElementById("edit_user_id").value = user_id;

    const modal = document.getElementById("editMarketingModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

function closeEditModal() {
    const modal = document.getElementById("editMarketingModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}

document.getElementById("editMarketingForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const authToken = localStorage.getItem("auth_token");

    if (!authToken) {
        alert("Authentication token missing");
        return;
    }

    const id = document.getElementById("edit_id").value;

    const formData = new FormData();
    formData.append("user_id", document.getElementById("edit_user_id").value);
    formData.append("market", document.getElementById("edit_market").value);
    formData.append("price", document.getElementById("edit_price").value);
    formData.append("date", document.getElementById("edit_date").value);

    fetch(`<?= BASE_URL ?>/marketing/update/${id}`, {
        method: "POST",
        headers: {
        "Authorization": `Bearer ${authToken}`,
        "Accept": "application/json"
    },
        body: formData
    })
    .then(res => res.json())
    .then(result => {
        if (result.status) {
            alert(result.message);
            closeEditModal();
            location.reload();
        } else {
            alert("Failed to update marketing");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Something went wrong");
    });
});
</script>



 <?php include('footer.php') ?>



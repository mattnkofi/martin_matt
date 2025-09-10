<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="utf-8" />
  <title>Landing | Matt Martin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      background-size: cover;
      color: #FFFFFF;
      margin: 0;
      padding: 0;
      filter: contrast(100%) brightness(100%);
      position: relative;
      min-height: 100vh;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      z-index: -1;
      pointer-events: none;
    }

    .orbitron {
      font-family: 'Orbitron', sans-serif;
    }
  </style>
</head>

<body class="transition-colors duration-300">

  <main class="container mx-auto px-6 py-16 max-w-2xl">
    <div class="text-center mb-12">
      <h1 class="text-5xl font-bold orbitron mb-3">Student Management</h1>
      <p class="text-gray-300 text-xl">Manage student records.</p>
    </div>

    <div class="grid grid-cols-1 gap-8">
      <!-- View list -->
      <div
        class="bg-black bg-opacity-70 rounded-xl p-8 shadow-lg border border-white border-opacity-20 flex flex-col items-center text-center hover:shadow-xl hover:scale-[1.03] transition-transform duration-200">
        <h2 class="text-2xl font-semibold orbitron mb-2 text-white">View Students</h2>
        <p class="text-gray-400 mb-6">Browse the full list.</p>
        <a href="<?= site_url('users'); ?>"
          class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-600 text-white font-semibold rounded-lg px-6 py-3 transition transform hover:scale-105">
          <i class="fas fa-list"></i> Go to Users
        </a>
      </div>

      <!-- Create -->
      <div
        class="bg-black bg-opacity-70 rounded-xl p-8 shadow-lg border border-white border-opacity-20 flex flex-col items-center text-center hover:shadow-xl hover:scale-[1.03] transition-transform duration-200">
        <h2 class="text-2xl font-semibold orbitron mb-2 text-white">Add Student</h2>
        <p class="text-gray-400 mb-6">Register a new student.</p>
        <form action="<?= site_url('users/create'); ?>" method="POST" class="w-full">
          <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg px-6 py-3 transition transform hover:scale-105 flex justify-center items-center gap-2">
            <i class="fas fa-user-plus"></i> Create User
          </button>
        </form>
      </div>

      <!-- Edit -->
      <div
        class="bg-black bg-opacity-70 rounded-xl p-8 shadow-lg border border-white border-opacity-20 flex flex-col items-center text-center hover:shadow-xl hover:scale-[1.03] transition-transform duration-200">
        <h2 class="text-2xl font-semibold orbitron mb-2 text-white">Edit Student</h2>
        <p class="text-gray-400 mb-6">Edit through ID.</p>

        <form id="editForm" method="GET" class="flex w-full max-w-xs gap-3">
          <input id="editId" type="number" name="id" min="1" required placeholder="Enter ID"
            class="flex-grow rounded-lg bg-gray-900 bg-opacity-80 border border-gray-600 text-white px-4 py-3 focus:outline-none focus:ring-4 focus:ring-blue-500" />
          <button type="submit"
            class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg px-6 py-3 transition transform hover:scale-105 flex items-center gap-2">
            <i class="fas fa-arrow-right"></i> Go
          </button>
        </form>
      </div>
    </div>
  </main>

  <script>
    document.getElementById('editForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const id = document.getElementById('editId').value.trim();
      if (!id) return alert("Please enter a user ID.");
      window.location.href = "<?= site_url('users'); ?>/" + encodeURIComponent(id) + "/edit";
    });
  </script>
</body>

</html>

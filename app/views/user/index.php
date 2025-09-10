<?php
$users = isset($users) && is_array($users) ? $users : [];

$perPage = isset($_GET['per_page']) ? max(1, (int)$_GET['per_page']) : 10;
$total   = count($users);
$totalPages = max(1, (int)ceil($total / $perPage));
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPages));
$offset = ($page - 1) * $perPage;
$rows = array_slice($users, $offset, $perPage);

function page_url($page, $perPage) {
  $qs = $_GET;
  $qs['page'] = $page;
  $qs['per_page'] = $perPage;
  return strtok($_SERVER['REQUEST_URI'], '?') . '?' . http_build_query($qs);
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="utf-8" />
  <title>Students | Matt Martin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      background: url('matt.jpg') no-repeat center center fixed;
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

    /* Scrollbar for table */
    .table-scroll::-webkit-scrollbar {
      height: 8px;
    }

    .table-scroll::-webkit-scrollbar-thumb {
      background-color: rgba(59, 130, 246, 0.5);
      border-radius: 4px;
    }

    .table-scroll::-webkit-scrollbar-track {
      background: transparent;
    }
  </style>
</head>

<body class="transition-colors duration-300">

  <!-- Navbar -->
  <header class="flex justify-between items-center px-10 py-6 bg-black bg-opacity-90 sticky top-0 z-50 shadow-lg">
    <a href="/" class="cursor-pointer orbitron text-white text-2xl font-bold flex items-center space-x-2">
      <span>Student Manager</span>
    </a>
    <nav class="space-x-8 hidden md:flex text-white orbitron uppercase tracking-widest font-semibold text-sm">
        <a href="/" class="hover:text-gray-300 transition">Home</a>
        <a href="/users/seed" class="hover:text-gray-300 transition">Students</a>
        <a href="/users/create" class="text-blue-500 border-b-2 border-blue-500">Register</a>
    </nav>
  </header>

  <main class="container mx-auto px-6 py-16 max-w-7xl flex flex-col gap-10">
    <!-- Header / Toolbar -->
    <div>
      <h1 class="h3 text-4xl font-semibold orbitron text-white mb-1">Students</h1>
      <small class="text-gray-400">Manage student records</small>
    </div>

    <!-- Controls row -->
    <div class="flex flex-col gap-4">
      <div class="text-gray-400 text-sm">
        <span class="inline-block bg-gray-700 rounded-full px-3 py-1 font-semibold text-sm mr-2"><?= $total ?></span> total students
      </div>

      <!-- Per-page selector -->
      <form method="get" class="flex items-center gap-2">
        <?php foreach ($_GET as $k => $v) : if ($k === 'per_page') continue; ?>
          <input type="hidden" name="<?= htmlspecialchars($k) ?>" value="<?= htmlspecialchars($v) ?>" />
        <?php endforeach; ?>
        <label for="per_page" class="text-gray-300 font-semibold select-none">Rows/page</label>
        <select id="per_page" name="per_page"
          class="bg-gray-900 text-white rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <?php foreach ([5, 10, 20, 50] as $n) : ?>
            <option value="<?= $n ?>" <?= $perPage === $n ? 'selected' : '' ?>><?= $n ?></option>
          <?php endforeach; ?>
        </select>
      </form>
    </div>

    <!-- Table card -->
    <div
      class="bg-black bg-opacity-70 rounded-xl shadow-lg border border-white border-opacity-20 overflow-hidden">
      <div class="overflow-x-auto table-scroll">
        <table class="min-w-full text-left text-gray-200">
          <thead class="bg-gray-900 border-b border-gray-700">
            <tr>
              <th class="px-6 py-3 w-20 font-semibold text-blue-400">ID</th>
              <th class="px-6 py-3 font-semibold text-blue-400">First Name</th>
              <th class="px-6 py-3 font-semibold text-blue-400">Last Name</th>
              <th class="px-6 py-3 font-semibold text-blue-400">Email</th>
              <th class="px-6 py-3 font-semibold text-blue-400">Username</th>
              <th class="px-6 py-3 w-56 font-semibold text-blue-400">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($rows)) : ?>
              <tr>
                <td colspan="6" class="text-center text-gray-500 py-8">No records found.</td>
              </tr>
            <?php else : ?>
              <?php foreach ($rows as $u) : ?>
                <tr class="hover:bg-blue-900 transition">
                  <td class="px-6 py-3 font-semibold"><?= htmlspecialchars($u['id'] ?? '') ?></td>
                  <td class="px-6 py-3"><?= htmlspecialchars($u['firstName'] ?? '') ?></td>
                  <td class="px-6 py-3"><?= htmlspecialchars($u['lastName'] ?? '') ?></td>
                  <td class="px-6 py-3">
                    <a href="mailto:<?= htmlspecialchars($u['email'] ?? '') ?>"
                      class="text-blue-400 hover:underline"><?= htmlspecialchars($u['email'] ?? '') ?></a>
                  </td>
                  <td class="px-6 py-3"><?= htmlspecialchars($u['username'] ?? '') ?></td>
                  <td class="px-6 py-3">
                    <div class="flex flex-wrap gap-2">
                      <a href="<?= site_url('users/' . urlencode($u['id'] ?? '')); ?>"
                        class="inline-flex items-center gap-1 px-3 py-1 rounded-md border border-white border-opacity-30 text-white hover:bg-white hover:text-black transition transform hover:scale-105 text-sm">
                        <i class="fas fa-eye"></i> View
                      </a>
                      <a href="<?= site_url('users/' . urlencode($u['id'] ?? '') . '/edit'); ?>"
                        class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-blue-700 hover:bg-blue-600 text-white font-semibold transition transform hover:scale-105 text-sm">
                        <i class="fas fa-pencil-alt"></i> Edit
                      </a>
                      <form action="<?= site_url('users/' . urlencode($u['id'] ?? '') . '/delete'); ?>" method="POST"
                        onsubmit="return confirm('Delete this user?');" class="inline">
                        <button type="submit"
                          class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-red-700 hover:bg-red-600 text-white font-semibold transition transform hover:scale-105 text-sm">
                          <i class="fas fa-trash"></i> Delete
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Footer: results summary + pagination -->
    <div
      class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 border-t border-gray-700 bg-gray-900 text-gray-400 text-sm select-none gap-4 sm:gap-0">
      <div>
        Showing <strong><?= $total ? ($offset + 1) : 0 ?></strong>–
        <strong><?= min($offset + $perPage, $total) ?></strong> of
        <strong><?= $total ?></strong> students
      </div>

      <nav aria-label="Pagination">
        <ul class="inline-flex -space-x-px rounded-md overflow-hidden shadow-sm">
          <li>
            <a href="<?= $page > 1 ? page_url(1, $perPage) : '#' ?>"
              class="block px-3 py-1 bg-gray-800 hover:bg-blue-700 text-white rounded-l-md <?= $page <= 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
              aria-disabled="<?= $page <= 1 ? 'true' : 'false' ?>">First</a>
          </li>
          <li>
            <a href="<?= $page > 1 ? page_url($page - 1, $perPage) : '#' ?>"
              class="block px-3 py-1 bg-gray-800 hover:bg-blue-700 text-white <?= $page <= 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
              aria-disabled="<?= $page <= 1 ? 'true' : 'false' ?>">&laquo;</a>
          </li>
          <?php
          $start = max(1, $page - 2);
          $end = min($totalPages, $page + 2);
          for ($p = $start; $p <= $end; $p++) :
          ?>
            <li>
              <a href="<?= page_url($p, $perPage) ?>"
                class="block px-3 py-1 <?= $p == $page ? 'bg-blue-600 text-white' : 'bg-gray-800 text-gray-300 hover:bg-blue-700 hover:text-white' ?>"><?= $p ?></a>
            </li>
          <?php endfor; ?>
          <li>
            <a href="<?= $page < $totalPages ? page_url($page + 1, $perPage) : '#' ?>"
              class="block px-3 py-1 bg-gray-800 hover:bg-blue-700 text-white <?= $page >= $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
              aria-disabled="<?= $page >= $totalPages ? 'true' : 'false' ?>">&raquo;</a>
          </li>
          <li>
            <a href="<?= $page < $totalPages ? page_url($totalPages, $perPage) : '#' ?>"
              class="block px-3 py-1 bg-gray-800 hover:bg-blue-700 text-white rounded-r-md <?= $page >= $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
              aria-disabled="<?= $page >= $totalPages ? 'true' : 'false' ?>">Last</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>

</body>

</html>

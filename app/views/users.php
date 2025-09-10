<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Details | Matt Martin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      background: url('matt.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #e2e8f0;
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

    /* Container for table parts */
    .table-wrapper {
      position: relative;
      width: 100%;
      min-height: 300px; /* adjust as needed */
    }

    /* Stack thead and tbody absolutely */
    .table-wrapper thead,
    .table-wrapper tbody {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      /* keep background for readability */
      border-collapse: separate;
      border-spacing: 0;
    }

    /* z-index to stack */
    .table-wrapper thead {
      z-index: 2;
    }

    .table-wrapper tbody {
      z-index: 1;
      top: 0; /* same top to overlap */
      opacity: 0.85; /* slight transparency so header is visible */
    }

    /* Optional: reduce pointer events on tbody so header links remain clickable */
    .table-wrapper tbody tr:hover {
      background-color: rgba(59, 130, 246, 0.7); /* Tailwind blue-500 with opacity */
    }
  </style>
  <nav class="space-x-8 hidden md:flex text-white orbitron uppercase tracking-widest font-semibold text-sm">
        <a href="/" class="hover:text-gray-300 transition">Home</a>
        <a href="/users/seed" class="hover:text-gray-300 transition">Students</a>
        <a href="/users/create" class="text-blue-500 border-b-2 border-blue-500">Register</a>
    </nav>
</head>

<body class="transition-colors duration-300">

  <main class="container mx-auto px-6 py-16 max-w-6xl">
    <h2 class="text-center text-4xl font-bold orbitron mb-10">User  Details</h2>

    <div class="overflow-x-auto rounded-xl shadow-lg border border-white border-opacity-20 bg-black bg-opacity-70">
      <div class="table-wrapper">
        <table class="min-w-full text-left text-gray-200 border-collapse">
          <thead class="bg-gray-900 border-b border-gray-700">
            <tr>
              <th class="px-6 py-3 w-20 font-semibold text-blue-400 text-center">ID</th>
              <th class="px-6 py-3 font-semibold text-blue-400 text-center">First Name</th>
              <th class="px-6 py-3 font-semibold text-blue-400 text-center">Last Name</th>
              <th class="px-6 py-3 font-semibold text-blue-400 text-center">Email</th>
              <th class="px-6 py-3 font-semibold text-blue-400 text-center">Username</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $u): ?>
              <tr class="hover:bg-blue-900 transition">
                <td class="px-6 py-3 font-semibold text-center"><?= htmlspecialchars($u['id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td class="px-6 py-3 text-center"><?= htmlspecialchars($u['firstName'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td class="px-6 py-3 text-center"><?= htmlspecialchars($u['lastName'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td class="px-6 py-3 text-center">
                  <a href="mailto:<?= htmlspecialchars($u['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    class="text-blue-400 hover:underline"><?= htmlspecialchars($u['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></a>
                </td>
                <td class="px-6 py-3 text-center"><?= htmlspecialchars($u['username'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>

</html>

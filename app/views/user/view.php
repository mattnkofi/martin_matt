<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="utf-8" />
  <title>View Student | Matt Martin</title>
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
  </style>
</head>

<body class="transition-colors duration-300">

  <!-- Navbar -->
  <header
    class="flex justify-between items-center px-10 py-6 bg-black bg-opacity-90 sticky top-0 z-50 shadow-lg select-none">
    <a href="/" class="cursor-pointer orbitron text-white text-2xl font-bold flex items-center space-x-2">
      <span>Student Manager</span>
    </a>
    <nav class="space-x-8 hidden md:flex text-white orbitron uppercase tracking-widest font-semibold text-sm">
        <a href="/" class="hover:text-gray-300 transition">Home</a>
        <a href="/users/seed" class="hover:text-gray-300 transition">Students</a>
        <a href="/users/create" class="text-blue-500 border-b-2 border-blue-500">Register</a>
    </nav>
  </header>

  <main class="container mx-auto px-6 py-16 max-w-3xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-10 gap-6">
      <h1 class="text-4xl font-bold orbitron leading-tight">Student #<?= htmlspecialchars($user['id']) ?></h1>
      <div class="flex gap-4 flex-wrap">
        <a href="<?= site_url('users/' . $user['id'] . '/edit'); ?>"
          class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-600 text-white font-semibold rounded-lg px-5 py-2 transition transform hover:scale-105 shadow-md">
          <i class="fas fa-pencil-alt"></i> Edit
        </a>
        <a href="<?= site_url('users'); ?>"
          class="inline-flex items-center gap-2 border border-white border-opacity-50 text-white rounded-lg px-5 py-2 hover:bg-white hover:text-black transition transform hover:scale-105 shadow-md">
          Back
        </a>
      </div>
    </div>

    <section
      class="bg-black bg-opacity-70 rounded-xl p-10 shadow-lg border border-white border-opacity-20 text-gray-300 select-text">
      <dl class="space-y-8 text-lg">
        <div>
          <dt class="text-gray-400 font-semibold mb-2 tracking-wide uppercase">First Name</dt>
          <dd class="text-white text-xl font-medium"><?= htmlspecialchars($user['firstName']) ?></dd>
        </div>
        <div>
          <dt class="text-gray-400 font-semibold mb-2 tracking-wide uppercase">Last Name</dt>
          <dd class="text-white text-xl font-medium"><?= htmlspecialchars($user['lastName']) ?></dd>
        </div>
        <div>
          <dt class="text-gray-400 font-semibold mb-2 tracking-wide uppercase">Email</dt>
          <dd>
            <a href="mailto:<?= htmlspecialchars($user['email']) ?>"
              class="text-blue-400 hover:underline text-xl font-medium"><?= htmlspecialchars($user['email']) ?></a>
          </dd>
        </div>
        <div>
          <dt class="text-gray-400 font-semibold mb-2 tracking-wide uppercase">Username</dt>
          <dd class="text-white text-xl font-medium"><?= htmlspecialchars($user['username']) ?></dd>
        </div>
      </dl>
    </section>
  </main>

</body>

</html>

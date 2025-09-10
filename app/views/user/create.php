<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register Student | Matt Martin</title>
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
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.65);
      z-index: -1;
      pointer-events: none;
      width: 100dvw;
      height: 100dvh;
    }

    /* Navbar font */
    .orbitron {
      font-family: 'Orbitron', sans-serif;
    }

    /* Input focus */
    input:focus,
    select:focus,
    textarea:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
      border-color: #3b82f6;
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

  <main class="container mx-auto px-6 py-16 max-w-3xl">
    <div class="mb-8 text-center">
      <h1 class="text-5xl font-bold orbitron mb-2">Register Student</h1>
      <p class="text-gray-300 text-lg">Fill in the details to add a new student record.</p>
    </div>

    <div id="flash-alert" class="mb-6"></div>

    <form action="<?= site_url('users/create'); ?>" method="POST" novalidate
      class="bg-black bg-opacity-70 rounded-xl p-8 shadow-lg border border-white border-opacity-20">
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label for="lName" class="block mb-2 font-semibold text-gray-200">Last Name</label>
          <input type="text" id="lName" name="lName" placeholder="Dela Cruz" required
            class="w-full rounded-lg bg-gray-900 bg-opacity-80 border border-gray-600 text-white px-4 py-3 transition focus:ring-4 focus:ring-blue-500" />
        </div>
        <div>
          <label for="fName" class="block mb-2 font-semibold text-gray-200">First Name</label>
          <input type="text" id="fName" name="fName" placeholder="Juan" required
            class="w-full rounded-lg bg-gray-900 bg-opacity-80 border border-gray-600 text-white px-4 py-3 transition focus:ring-4 focus:ring-blue-500" />
        </div>
        <div>
          <label for="username" class="block mb-2 font-semibold text-gray-200">Username</label>
          <input type="text" id="username" name="username" placeholder="juan123" required
            class="w-full rounded-lg bg-gray-900 bg-opacity-80 border border-gray-600 text-white px-4 py-3 transition focus:ring-4 focus:ring-blue-500" />
        </div>
        <div>
          <label for="email" class="block mb-2 font-semibold text-gray-200">Email</label>
          <input type="email" id="email" name="email" placeholder="juan@email.com" required
            class="w-full rounded-lg bg-gray-900 bg-opacity-80 border border-gray-600 text-white px-4 py-3 transition focus:ring-4 focus:ring-blue-500" />
        </div>
      </div>

      <div class="flex justify-end space-x-4 mt-8">
        <button type="submit"
          class="bg-white text-black font-bold rounded-lg px-6 py-3 hover:bg-gray-300 transition transform hover:scale-105 flex items-center space-x-2">
          <i class="fas fa-check-circle text-green-600 text-xl"></i>
          <span>Submit</span>
        </button>
        <a href="<?= site_url('/users'); ?>"
          class="border border-white border-opacity-50 text-white rounded-lg px-6 py-3 hover:bg-white hover:text-black transition transform hover:scale-105 flex items-center space-x-2">
          <i class="fas fa-times-circle text-red-600 text-xl"></i>
          <span>Cancel</span>

          <div id="successMessage" class="hidden mt-4 text-green-600 font-bold">
            Student added successfully!
          </div>

        </a>
      </div>
    </form>
  </main>

</body>

</html>

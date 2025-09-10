<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Hello Matt</title>
  <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Roboto Condensed', sans-serif;
      background: url('matt.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #e2e8f0;
      position: relative;
      min-height: 100vh;
      filter: contrast(100%) brightness(100%);
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      z-index: -1;
      pointer-events: none;
    }

    .container {
      position: relative;
      max-width: 960px;
      margin: 3rem auto;
      background: rgba(15, 23, 42, 0.85);
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
      overflow: visible;
      padding: 0;
      height: 200px; /* fixed height to contain stacked elements */
    }

    .header,
    .main {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      padding: 2rem;
      box-sizing: border-box;
    }

    .header {
      background: #1b4b91;
      color: #ffffff;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
      z-index: 2; /* on top */
    }

    .header h1 {
      margin: 0;
      font-size: 2.5rem;
      font-weight: 700;
      font-family: 'Orbitron', sans-serif;
    }

    .main {
      color: #f1f5f9;
      font-size: 1.25rem;
      text-align: center;
      min-height: 4rem;
      background: rgba(15, 23, 42, 0.85);
      z-index: 1; /* behind header */
      padding-top: 4rem; /* push content down so text is visible below header text */
    }

    h2 {
      color: #4ea8de;
      margin-top: 2rem;
    }

    p {
      line-height: 1.6;
      margin-bottom: 1rem;
    }

    code,
    pre {
      display: block;
      background: #0a0f1a;
      padding: 1rem;
      border-left: 4px solid #1b4b91;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      color: #e2e8f0;
      border-radius: 6px;
      box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.4);
      overflow-x: auto;
      font-family: 'Fira Mono', monospace;
    }

    a {
      color: #4ea8de;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    a:hover {
      text-decoration: underline;
      color: #90e0ef;
    }

    .footer {
      font-size: 0.9rem;
      text-align: center;
      padding: 1rem;
      background: #0a0f1a;
      border-top: 1px solid #1e293b;
      color: #94a3b8;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1rem;
    }

    .card {
      background: #0f172a;
      padding: 1.5rem;
      border-radius: 10px;
      border: 1px solid #1e293b;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.6);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.85);
    }

    .card h3 {
      margin-top: 0;
      color: #4ea8de;
    }
  </style>
</head>

<body>
  <div class="container" role="main">
    <header class="header">
      <h1>
        <?php
        if (isset($fname)) {
          echo "Profile";
        } else {
          echo "Get Id";
        }
        ?>
      </h1>
      <nav class="space-x-8 hidden md:flex text-white orbitron uppercase tracking-widest font-semibold text-sm">
        <a href="/" class="hover:text-gray-300 transition">Home</a>
        <a href="/users/seed" class="hover:text-gray-300 transition">Students</a>
        <a href="/users/create" class="text-blue-500 border-b-2 border-blue-500">Register</a>
    </nav>
    </header>

    <section class="main">
      <?php
      if (isset($fname) && isset($lname)) {
        echo htmlspecialchars($fname . " " . $lname, ENT_QUOTES, 'UTF-8');
      } else {
        echo htmlspecialchars($id . " " . $name, ENT_QUOTES, 'UTF-8');
      }
      ?>
    </section>
  </div>
</body>

</html>

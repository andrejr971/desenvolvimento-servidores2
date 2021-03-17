<?php
  $exceptions = [
    '.git',
    '.',
    '..',
    'css',
    'index.php',
    'assets',
    '.htaccess',
    'dashboard.php'
  ];

  $path = "./";
  $directory = dir($path);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aulas PHP</title>
  <link rel="stylesheet" href="css/styles.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
      <header class="header">
        <img src="assets/complement.svg" alt="Img complementar" class="complement">
        <div class="logo">
          <img src="assets/logo.svg" alt="logo André Junior">
          <div class="name">
            <span>André</span>
            <strong>Junior</strong>
          </div>
      </div>
      <h1>Aulas PHP</h1>
    </header>

    <nav class="nav">
      <ul class="nav-lists">
        <?php
          while (($file = $directory->read()) !== false) {
            if (!in_array($file, $exceptions)) {
        ?>
          <li class="nav-item">
            <a href="<?= $file ?>">
              <?= $file ?>
            </a>
          </li>
        <?php
            }
          }
          
          $directory->close();
        ?>
      </ul>
    </nav>
  </div>
</body>
</html>
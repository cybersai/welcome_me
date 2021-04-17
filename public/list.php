<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>List</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<?php
// Include config file
require_once __DIR__ . '/config.inc.php';

// No not allow anyone that is not authenticated 
// Take them to index (login) and tell them why.
if (!isset($_SESSION['name'])) {
  $_SESSION['flash'] = 'You are not authenticated yet';
  header('Location: index.php');
}

// Get all users from the database and save as $results
$results = dibi::query('SELECT * FROM users');

?>
<body>

  <!-- Dashboard Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div style="margin-top: 50px">
      <h4><?= $_SESSION['name'] ?> and friends</h4>

      <table style="width: 100%;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
          </th>
        </thead>
        <tbody>
          <?php
            // Loop through all the users and display them
            foreach($results as $user) {
              echo "<tr><td>{$user->name}</td><td>{$user->email}</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    <a href="/dashboard.php">Go to dashboard</a>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

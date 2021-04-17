<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Dashboard</title>
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

// No not allow anyone that is not authenticated to view this page,
// Take them to index (login) and tell them why.
if (!isset($_SESSION['name'])) {
  $_SESSION['flash'] = 'You are not authenticated yet';
  header('Location: index.php');
}

// If the user wants to logout, let him/her and take her to login page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  session_unset();
  header('Location: index.php');
  $_SESSION['flash'] = 'See you soon';
}


?>
<body>

  <!-- Dashboard Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div style="margin-top: 25%">
      <!--  display the logged in users name -->
      <h4>Welcome, <?= $_SESSION['name'] ?> 👋</h4>
      <div class="row">
        <div class="one-half column">
          <p>First of all ☝️, let me thank you for wasting your time to login 😝. We are grateful 😜.</p>
          <p>You are login and so what ? 🤷‍♂️ Please the buttons below are all yours 🤭. Thank me later  🤫.</p>
        </div>
      </div>
    </div>
    <!-- form to logout the user -->
    <form id="logout" method="POST" action="/dashboard.php" style="display: inline;">
      <button type="submit">Going, will be back</button> &nbsp;
    </form>
    <a href="https://github.com/CyberSai" target="_blank">Coming to beat you</a> &nbsp;
    <a href="/list.php">Looking for people link me</a>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

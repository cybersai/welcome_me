<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Login</title>
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
  <!-- Register Logic with PHP
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php
// Include config file
require_once __DIR__ . '/config.inc.php';

// Only execute if a form is submitted/posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // take out whitespace and the beginning and end of the user input and save as email
  $email = trim($_POST['email']);
  // get the users password
  $password = $_POST['password'];

  // check if both the email and password is empty then warn the user
  if (empty($email) || empty($password)) {
    $_SESSION['flash'] = "Please fill in all the form inputs.";
  } else {
    // Get the user with that email from the database
    $user = dibi::query('SELECT * FROM users WHERE email = ?', $email)->fetch();
    // verify the provided password is the same has the password used for registration
    if ($user && password_verify($password, $user->password)) {
      // that the use to the dashboard and save the name
      $_SESSION['name'] = $user->name;
      header('Location: dashboard.php');
    } else {
      // if use can not be found, tell the person
      $_SESSION['flash'] = "We could not find user with that credential.";
    }
  }
}

// if the user is login already, take him to the dashboard
if (isset($_SESSION['name'])) {
  header('Location: dashboard.php');
}
?>
<body>

  <!-- Login Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div style="margin-top: 25%">
      <h2>Login</h2>
      <!-- display flash messages from the session and remove them when done -->
      <?php
      if (isset($_SESSION['flash'])) {
        echo "<h6>{$_SESSION['flash']}</h6>";
        unset($_SESSION['flash']);
      }
      ?>
      <form id="login" method="POST" action="/index.php">
        <div>
          <label>E-Email Address</label>
          <input type="email" name="email" id="email" style="width: 100%;">
        </div>
        <div>
          <label>Password</label>
          <input type="password" name="password" id="password" style="width: 100%;">
        </div>
        <button type="submit" class="button-primary">Let Me In</button> &nbsp;
        <a href="/register.php">Take me to register</a>
      </form>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

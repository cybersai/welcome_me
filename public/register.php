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
  // take out whitespace and the beginning and end of the user input and save as name and email 
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  // get the users password
  $password = $_POST['password'];

  // check if any of the name, email and password is empty then warn the user
  if (empty($name) || empty($email) || empty($password)) {
    $_SESSION['flash'] = "Please fill in all the form inputs.";
  } else {
    // create and associative array of the input to be saved in the database
    // hash/encrypt the password before storage
    $user = [
      'name' => $name, 'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT),
    ];
    // Get ready for exception to happen when saving
    try {
      // save the user in to that database
      dibi::query('INSERT INTO users', $user);
      // notify him/her it been successful so they login
      $_SESSION['flash'] = "{$name} has been added successfully.";
    } catch (Exception $exception) {
      // if there was an exception/error, tell the user
      $_SESSION['flash'] = "We could not add the user: {$exception->getMessage()}";
    }
  }
}

// if the user is login already, take him to the dashboard
if (isset($_SESSION['name'])) {
  header('Location: dashboard.php');
}
?>
<body>

  <!-- Register Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div style="margin-top: 25%">
      <h2>Register</h2>
      <!-- display flash messages from the session and remove them when done -->
      <?php
      if (isset($_SESSION['flash'])) {
        echo "<h6>{$_SESSION['flash']}</h6>";
        unset($_SESSION['flash']);
      }
      ?>
      <form id="register" method="POST" action="/register.php">
        <div>
          <label>Name</label>
          <input type="text" name="name" id="name" style="width: 100%;">
        </div>
        <div>
          <label>E-Email Address</label>
          <input type="email" name="email" id="email" style="width: 100%;">
        </div>
        <div>
          <label>Password</label>
          <input type="password" name="password" id="password" style="width: 100%;">
        </div>
        <button type="submit" class="button-primary">Please Add Me</button> &nbsp;
        <a href="/index.php">Take me to login</a>
      </form>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

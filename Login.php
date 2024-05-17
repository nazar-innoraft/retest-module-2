<?php

session_start();
if (isset($_SESSION['email'])) {
  header('Location: /');
  exit;
}

if (isset($_POST['submit'])) {
  $db = new Database;
  $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
  $db->query($sql, [input('email')]);
  if ($db->row_count() > 0) {
    $cred = $db->fetch();
    if (input('password') == $cred['password']) {
      $_SESSION['email'] = $cred['email'];
      $_SESSION['role'] = $cred['role'];
      header('Location: /');
    } else {
      $message = 'password wrong';
    }
  } else {
    $message = 'user not present';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>login</title>
</head>

<body>
  <div class="container">
    <h2>Login Form</h2>
    <form action="" method="post">
      <label for="email">Email :</label>
      <input type="email" name="email" id="email">

      <label for="password">Password :</label>
      <input type="password" name="password" id="password">

      <input type="submit" name="submit" id="submit">
    </form>
    <div><?= $message ?? '' ?></div>
  </div>
</body>

</html>

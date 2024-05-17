
$message = '';


if (isset($_POST['submit'])) {
  $name = input('name');
  $price = input('price');
  $catagory = strtoupper(input('catagory'));

  // Checks name is valid or not.
  if (!preg_match('/^[a-zA-Z\s]*$/', $name)) {
    $message .= "Name can contains letters and space only ";
  }

  // Checks price is valid or not.
  if (!ctype_digit($price)) {
    $message = "Price can contains only digit ";
  }

  // Checks catagory is valid or not.
  if ($catagory != 'UNHEALTHY' && $catagory != 'HEALTHY') {
    $message .= "Please select catagory";
  }

  if ($message == '') {

    $db = new Database;
    $sql = "INSERT INTO products (name, price, catagory) VALUES (?, ?, ?)";

    $db->query($sql, [$name, intval($price), $catagory]);
    if ($db->row_count() > 0) {
      $message = "Product added";
    } else {
      $message = "Product can not be added";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Home | Admin</title>
</head>

<body>
  <div class="container">userGroupHandle
    <h2>Hello, <?= $_SESSION['email'] ?></h2> <a href="/logout">Logout</a>

    <form action="" method="post">
      <label for="name">Product name : </label>
      <input type="text" name="name" id="name">

      <label for="price">Product price : </label>
      <input type="number" name="price" id="price">

      <p>Please select catagory : </p>
      <input style="width: 10%; display: inline;" type="radio" id="healthy" name="catagory" value="Healthy">
      <label style="width: 10%; display: inline;" for="healthy">Healthy</label>
      <input style="width: 10%; display: inline;" type="radio" id="unhealthy" name="catagory" value="Unhealthy">
      <label style="width: 10%; display: inline;" for="unhealthy">Unhealthy</label>

      <input type="submit" name="submit" id="submit">
    </form>
    <div class="message"><?= $message ?></div>
  </div>
</body>

</html>

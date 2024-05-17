
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/user.css">
  <title>Home | User</title>
</head>

<body>
  <div class="rappper">
    <h2>Hello, <?= $_SESSION['email'] ?></h2> <a href="/logout">Logout</a>
    <div id="selectcat">
      <form id="form-select" method="post">
        <input type="checkbox" class="checkbox" name="catagory" id="healthy" value="healthy"> healthy
        <input type="checkbox" class="checkbox" name="catagory" id="unhealthy" value="unhealthy"> unhealthy
        <button type="button" id="getValsBtn">Submit</button>
      </form>
    </div>


    <div id="list">
      <table>
        <thead>
          <th>select</th>
          <th>id</th>
          <th>name</th>
          <th>price</th>
          <th>quunatity</th>
        </thead>
        <tbody id="products">

        </tbody>
      </table>
    </div>
  </div>

  <script src="js/ajax.js"></script>
</body>

</html>

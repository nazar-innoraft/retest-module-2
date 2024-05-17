<?php

require_once 'Database.php';

session_start();

if ($_POST['action'] == 'load') {
  $str = $_POST['catagory'];
  $words = $_POST['catagory'];
  $count = count($words);
  $sql = '';

  if ($count == 2) {
    $sql = "SELECT * FROM products";
  } else {
    foreach ($words as $word) {
      if (strtoupper($word) == 'UNHEALTHY'){
        $sql = "SELECT * FROM products WHERE catagory = 'UNHEALTHY'";
      } elseif (strtoupper($word) == 'HEALTHY') {
        $sql = "SELECT * FROM products WHERE catagory = 'HEALTHY'";
      } else {
        continue;
      }
    }
  }
  $db = new Database;
  $db->query($sql);
  $res = '';
  if ($db->row_count() > 0) {

    $data = $db->fetch_all();
    foreach($data as $row) {
      $res .= '<tr>
            <td><input type="checkbox" name="" id="' . $row['id'] . '"></td>
            <td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['price'] . '</td>
            <td></td>
          </tr>';
    }
  }
  echo $res;
}

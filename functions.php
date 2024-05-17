<?php

function input($input) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'post') {
    $input = $_POST[$input];
    $input = trim($input);
    $input = htmlentities($input);
    return $input;
  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get') {
    $input = $_POST[$input];
    $input = trim($input);
    $input = htmlentities($input);
    return $input;
  }
}

function checkVal($title, $author, $rating, $genre, $category) : string {
  $res = '';
  if (!ctype_alpha($title) && !ctype_alnum($title)) {
    $res .= 'Title not in correct format ';
  }
  if (!ctype_alpha($author)) {
    $res .= 'Author not in correct format ';
  }
  if (!ctype_alpha($genre)) {
    $res .= 'Genre not in correct format ';
  }
  if (!ctype_alpha($category)) {
    $res .= 'Category not in correct format ';
  }
  if (!ctype_digit($rating)) {
    $res .= 'Rating not in correct format ';
  }

  if($res == '') {
    return 'SUCCESS';
  }
  return $res;
}

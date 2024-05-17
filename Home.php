<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: /login');
}

if ($_SESSION['role'] == 'ADMIN') {
  require 'admin/Home.php';
} else {
  require 'user/Home.php';
}


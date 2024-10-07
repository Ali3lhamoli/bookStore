<?php

session_start();
$config = require_once 'config.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
  header("Location: " . $config['base_url'] . "pages/dashboard");

  exit;
} else {
  header("Location: " . $config['base_url'] . "login/index.php");

  exit;
}

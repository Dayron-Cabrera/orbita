<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_database'
) or die(mysqli_erro($mysqli));
?>
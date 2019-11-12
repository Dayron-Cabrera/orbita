<?php
session_start();
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  '',
  'php_database'
) or die(mysqli_erro($mysqli));
?>
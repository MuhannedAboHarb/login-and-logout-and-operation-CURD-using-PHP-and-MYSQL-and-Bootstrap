<?php session_start();
  if(isset($_SESSION['id'])){
    $_SESSION = [];
    session_destroy();
    header('location:login.php');
  }
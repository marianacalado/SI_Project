<?php
  session_start();
  session_destroy();
  header("Location: init_page.php");
?>
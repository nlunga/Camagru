<?php
if (isset($_POST['upload-prof'])) {
  echo "<pre>" , print_r($_POST) , "</pre>";
  echo "<pre>" , print_r($_FILES) , "</pre>";
  echo "<pre>" , print_r($_FILES['profile-photo']) , "</pre>";
}
?>

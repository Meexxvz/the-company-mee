<?php
  include "../classes/User.php";
  $user = new User;
  $user ->update($_POST, $_FILES);
  # The $_POST -> holds the data link the filename, lastname, username, etc.
  # The $_FILES -> holds the image/photo uploaded by the user


?>
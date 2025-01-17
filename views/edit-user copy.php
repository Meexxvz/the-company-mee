<?php
  session_start();
  require "../classes/User.php";

  # Create an object
  $user_obj = new User;
  $user = $user_obj->getUser($_SESSION['id']);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
    <!-- Bootstrap CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
      </a>
      <div class="navbar-nav">
        <span class="navbar-text"><?=$_SESSION['full_name']?></span>
        <form action="../actions/logout-action.php" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="row justify-content-center gx-0">
    <div class="col4">
      <h2 class="text-cemter-mb-4">EDIT USER</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="col-6">
          <?php
            if($user['photo']){
          ?>
            <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo']?>" class="d-block mx-auto edit-photo">
          <?php
            }elese{
          ?>
            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>

          <?php
            }
          ?>

          <input type="file" name="photo" class="form-contorol mt-2" accept="/*">
        </div>
        <div class="mb-3">
          <label for="first-name" class="form-label">First Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name']?>" required autofocus>
        </div>
        <div class="mb-3">
          <label for="last-name" class="form-label">Last Name</label>
          <input type="text" name="last-name" id="last-name" class="form-control" value="<?= $user['last_name']?>" required autofocus>
        </div>
        <div class="mb-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']?>" required autofocus>
        </div>
        <div class="text-end">
          <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
          <button type="submit" class="btn btn-warning ntn-sm px-5">Save</button>
        </div>
      </form>
    </div>
  </main>


  
</body>
</html>



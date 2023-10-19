<?php
require 'config/database.php';


//get avatar from database 
  if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsive multioage blog website</title>
    <link rel="stylesheet" href="<?= ROOT_URL?>css/style.css">
    <!--icons  cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<body>
    <nav>
        <div class="container nav_container">
<a href=" <?= ROOT_URL ?>" class="nav_logo">Egator</a>
<ul class="nav_items">
<li><a href=" <?= ROOT_URL ?>blog.php">Blog</a></li>
<li><a href=" <?= ROOT_URL ?>about.php">About</a></li>
<li><a href=" <?=  ROOT_URL?>services.php">Services</a></li>
<li><a href=" <?= ROOT_URL?>contact.php">Contact</a></li>
<?php if (isset($_SESSION['user-id'])) : ?>

<li class="nav_profile">
    <div class="avatar">
    <img src="<?= ROOT_URL . 'images/' . $avatar['avatar']; ?>" alt="avatar">
    </div>
    <ul>
        <li><a href="<?= ROOT_URL?>admin/index.php">Dasboard</a></li>
        <li><a href="<?= ROOT_URL?>logout.php">logOut</a></li>
    </ul>
</li>
<?php else : ?>
 <li><a href=" <?=  ROOT_URL?>signin.php">Signin</a></li> 
 <?php endif ?> 
</ul>

<button id="open_nav-btn"><i class="fa-solid fa-bars"></i></button>
<button id="close_nav-btn"><i class="fa-solid fa-xmark"></i></button>
    </div>
    </nav>

        <!--==============end of nav=================-->
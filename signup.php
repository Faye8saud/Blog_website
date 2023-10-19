  <?php
    session_start();
  require 'config/constants.php';

// get back form data if there was regesteration error
$firstname=$_SESSION['signup-data']['firstname']  ?? null;
$lastname=$_SESSION['signup-data']['lastnme']  ?? null;
$username=$_SESSION['signup-data']['username']  ?? null;
$email=$_SESSION['signup-data']['email']  ?? null;
$createpassword=$_SESSION['signup-data']['createpassword']  ?? null;
$confirmpassword=$_SESSION['signup-data']['confirmpassword']  ?? null;
// delete signup data session
unset($_SESSION['signup-data']);

  ?>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>responsive multioage blog website</title>
        <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
        <!--icons  cdn-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <body>

  <section class="form_section">
    <div class="container form_section-container">
        <h2>Sign up</h2>
       <?php 
       if(isset($_SESSION['signup'])): ?>
        <div class="alert_message error">
          <p> <?= $_SESSION['signup'];
            unset($_SESSION['signup']); 
            ?></p> 
       
        </div> 
        <?php endif ?>
            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname?>"placeholder="last Name">
                <input type="text" name="username" value="<?= $username?>" placeholder="usename">
                <input type="text" name="email" value="<?= $email?>" placeholder="email">
                <input type="password" name="createpassword" value="<?= $createpassword?>" placeholder="Create password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm password">
                <div class="form_control">
                    <label for="avatar">User avatar</label>
                    <input name="avatar" type="file"  id="avatar">
                </div>
                    <button class="btn" name="submit" type="submit">Sign up</button>
                    <small>Already have an account ? <a href="signin.php">sign in</a></small>
              
            </form>
    </div>
</section>
</body>
</html>
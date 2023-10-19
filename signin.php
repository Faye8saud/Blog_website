  <?php
  session_start();
  require 'config/constants.php';

  $username_email = $_SESSION['signin-data']['username_email'] ?? null;
  $password = $_SESSION['signin-data']['password'] ?? null;

  unset($_SESSION['signin-data']);
  ?>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>responsive multioage blog website</title>
        <link rel="stylesheet"  href="<?= ROOT_URL ?>css/style.css">
        <!--icons  cdn-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <body>

  <section class="form_section">
    <div class="container form_section-container">
        <h2>Sign in</h2>
 <?php if(isset($_SESSION['signup-success'])) : ?>
    <div class="alert_message success">
            <p>
            <?= $_SESSION['signup-success'];
            unset($_SESSION['signup-success']); ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['signin'])) : ?>
    <div class="alert_message error">
           <p>
             <?= $_SESSION['signin'];
            unset($_SESSION['signin']); ?>
            </p>
        </div>
    <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                <input type="text" name="username_email" id="" value="<?= $username_email?>" placeholder="Username or Email">
                <input type="password" name="password" id="" value="<?= $password?>" placeholder="password">
              
                    <button class="btn" name="submit" type="submit">Sign in</button>
                    <small>Dont have an account ? <a href="signup.php">sign up</a></small>
              
            </form>
    </div>
</section>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="login.css" />
  <title>Signing Form Layout</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="user" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="pass" />
          </div>
          <?php
include('includes/connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['register'])) {
    $username = $_POST['userreg'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $mail = $_POST['mailreg'];
    $password = $_POST['passreg'];
    $passwordre = $_POST['passreg-confirm'];
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    


    //Check If The User Exist In Database

    $stmt = $db->prepare("SELECT username, password FROM users WHERE username = ? AND password = ? ");
    $stmt->execute(array($username, $hashedPass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // If Count > 0 This Mean The Database Contain Record About This Username
    if ($count > 0) {
      echo 'user is already exist';
      exit();
    }

    if ($password !== $passwordre) {
      echo 'Please Retype The Password Correctly';
    } elseif (empty($username)) {
      echo 'Please Enter Your Username';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      echo 'Please Enter The Mail Correctly';
    } else {
      $stmt = $db->prepare('INSERT INTO users (username, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)');
      $stmt->execute(array($username, $mail, $hashedPass, $first_name, $last_name));
    }
  }
  if (isset($_POST['login'])) {

    $username_login = $_POST['user'];
    $password_login = $_POST['pass'];

    //Check If The User Exist In Database

    $stmt = $db->prepare("SELECT username, password, user_id FROM users WHERE username = ? ");
    $stmt->execute(array($username_login));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // If Count > 0 This Mean The Database Contain Record About This Username
    if ($count > 0) {
      if (password_verify($password_login, $row['password'])) {
        session_start();
        $_SESSION['Username'] = $username_login;
        $_SESSION['ID'] = $row['user_id'];
        header('Location:Products.php');
        exit();
      }
    } else {
      echo '<h4 style=" color: red; ">The Data You Entered Is Incorrect</h4>';
    }
  }
}
?>
          <input type="submit" value="Login" name="login" class="btn solid" />
          
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="userreg" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First Name" name="first-name" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Last Name" name="last-name" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="mailreg" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="passreg" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password Confirmation" name="passreg-confirm" />
          </div>
          <input type="submit" class="btn" name="register" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>
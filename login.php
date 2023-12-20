<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
  <title>Log In</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <?php

  include 'dbcon.php';

  if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " select * from registration where email = '$email'  ";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count) {
      $email_pass = mysqli_fetch_assoc($query);

      $db_pass = $email_pass['password'];

      $pass_decode = password_verify($password, $db_pass);

      if ($pass_decode) {
        ?>

        <script>
            alert('Log In successfull');
            location.replace("index.html");
        </script>
        <?php
      }
      else{
        ?>
        <script>
            alert('Passwordis Incorrect!!!');
        </script>
        <?php
      }
    }
    else{
      ?>
        <script>
            alert('Invalid Email Id!!!');
        </script>
        <?php
    }

  }


  ?>


  <div class="nav">
    <div class="container">
      <div class="nav__wrapper">
        <a href="./aboutus.html" class="logo">
          <img src="./img/logo.svg" alt="Tiffin Service">
        </a>
        <nav>
          <div class="nav__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-menu">
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
          </div>
          <div class="nav__bgOverlay"></div>
          <ul class="nav__list">
            <div class="nav__close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
            </div>
            <div class="nav__list__wrapper">
              <li><a href="./signup.php" class="btn primary-btn">Sign Up</a></li>
            </div>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  
  
  <section id="form" data-aos="fade-up">
    <div class="container">
      <h3 class="form__title">Log In</h3>
      <div class="form__wrapper">
        <form name="Log In" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
         
          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
         
          <div class="form__group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="8">
          </div>
          
         
          <button type="submit" name="submit" class="btn primary-btn signup login">login</button>
        </form>
        <p class="existing_user_login new_user_signup ">New User? &nbsp; <a href="./signup.php">Sign Up</a> </p>
      </div>
    </div>
  </section>
  

<footer>
    <div class="container">
      <div class="footer__wrapper">
        <div class="footer__col1">
          <div class="footer__logo">
            <img src="./img/footer-logo.svg" alt="Tiffin Service">
          </div>
          <p class="footer__desc">
            Fresh and delicious traditional Gujarati, Punjabi and kathiyawadi food to delight the whole family.
          </p>
          <div class="footer__socials">
            <h4 class="footer__socials__title">Follow us</h4>
            <ol class="footer__socials__list">
              <li>
                <a href="https://www.facebook.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-instagram">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                  </svg>
                </a>
              </li>
            </ol>
          </div>
        </div>
        <div class="footer__col2">
          <h3 class="footer__text__title">
            Links
          </h3>
          <ol class="footer__text">
            <li>
              <a href="login.php" onclick="signin()" >Home</a>
            </li>
            <li>
              <a href="login.php" onclick="signin()">Gujarati</a>
            </li>
            <li>
              <a href="login.php" onclick="signin()">Kathiyawadi</a>
            </li>
            <li>
              <a href="login.php" onclick="signin()">Punjabi</a>
            </li>
            <li>
              <a href="login.php" onclick="signin()">Other</a>
            </li>
            <li>
              <a href="login.php" onclick="signin()">Order Now</a>
            </li>
            <li>
              <a href="./aboutus.html">About Us</a>
            </li>
          </ol>
        </div>
        <div class="footer__col3">
          <h3 class="footer__text__title">
            Support
          </h3>
          <ol class="footer__text">
            <li>
              <a href="./aboutus.html">contact Us</a>
            </li>
            <li>
              <a href="./aboutus.html">Support Center</a>
            </li>
            <li>
              <a href="./aboutus.html">Feedback</a>
            </li>
          </ol>
        </div>
        <div class="footer__col4">
          <h3 class="footer__text__title">
            Contact
          </h3>
          <ol class="footer__text">
            <li>
              <a href="#">+91 12345 67895</a>
            </li>
            <li>
              <a href="#">IT.SPCE@gmail.com</a>
            </li>
            <li>
              <a href="#">Anand, Gujarat</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </footer>
  <div id="copyright">
    <div class="container">
      <p class="copyright__text">
        © copyright 2021 | All rights reserved
      </p>
    </div>
  </div>
  
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./main.js"></script>

  <script>
    function signin(){
      alert("Please Sign in first for Access!!!");
    }
  </script>
</body>

</html>
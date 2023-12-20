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
  <title>Sign Up</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./globalStyles.css">
  <link rel="stylesheet" href="./components.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>


  <?php 

  include 'dbcon.php';

  if(isset($_POST['submit'])){
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select * from registration where email='$email' " ;
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
      ?>
        
      <script>
        alert('Email Already Exists!!!');
      </script>

      <?php
    }
    else{
      if ($password === $cpassword) {
        
        $insertquery = " insert into registration(fullname, username , email, number, password, cpassword, city, address) values('$fullname','$username','$email','$number','$pass','$cpass','$city','$address')";

        $iquery = mysqli_query($con, $insertquery);

        if ($iquery) {
          ?>
  
          <script>
              alert('Inserted successfull');
              location.replace("index.html");
          </script>
          <?php
        }
        else{
          ?>
          <script>
              alert('Somwthing is wrong');
          </script>
          <?php
        }

      }
      else{
        ?>
        
        <script>
          alert('Password is not matching!!!');
        </script>

        <?php
      }
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
              <li><a href="./login.php" class="btn primary-btn">Log In</a></li>

            </div>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  
  
  <section id="form" data-aos="fade-up">
    <div class="container">
      <h3 class="form__title">Sign Up</h3>
      <div class="form__wrapper">
        <form name="signup" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
         
          
          <div class="form__group">
            <label for="lastName">Full Name</label>
            <input type="text" id="lastName" name="fullname" required>
          </div>
          <div class="form__group">
            <label for="firstName">User Name</label>
            <input type="text" id="firstName" name="username" required>
          </div>
          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form__group">
            <label for="number">Mobile Number</label>
            <input type="tel" id="number" name="number" required maxlength="10">
          </div>
          <div class="form__group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="8">
          </div>
          <div class="form__group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="cpassword" required minlength="8">
          </div>
          <div class="form__group">
            <label for="city">City</label>
            <select  name="city" id="city" required> 
              <option value="anand">Anand</option>
              <option value="bakrol">Bakrol</option>
              <option value="vidhyanagar">Vidhyanagar</option>
            </select>
          </div>
          <div class="form__group">
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="2" rows="1" required></textarea>
          </div>
          

        <button type="submit" name="submit" class="btn primary-btn signup login"  >Register</button>
        </form>
        <p class="existing_user_login new_user_signup">Already Have a Account? &nbsp; <a href="./login.php">Log In</a> </p>
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
            Fresh and delicious traditional Bangladeshi food to delight the whole family.
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
              <a href="signup.php" onclick="reg()" >Home</a>
            </li>
            <li>
              <a href="signup.php" onclick="reg()">Gujarati</a>
            </li>
            <li>
              <a href="signup.php" onclick="reg()">Kathiyawadi</a>
            </li>
            <li>
              <a href="signup.php" onclick="reg()">Punjabi</a>
            </li>
            <li>
              <a href="signup.php" onclick="reg()">Other</a>
            </li>
            <li>
              <a href="signup.php" onclick="reg()">Order Now</a>
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
              <a href="./contact.html">contact Us</a>
            </li>
            <li>
              <a href="#">Support Center</a>
            </li>
            <li>
              <a href="./contact.html">Feedback</a>
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
    function reg(){
      alert("Please Sign up first for Access!!!");
    }
</script>
</body>

</html>
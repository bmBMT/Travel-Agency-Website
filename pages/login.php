<?php
  session_start();
  if ($_SESSION['user']) {
    header('Location: /');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="/styles/sign_style.css" />
    <link rel="icon" href="/assets/icons/title_icon.svg" />
    <title>Travel Agency Website — Login</title>
  </head>

  <body>
    <div class="login container">
        <div class="sign_contain">
          <div class="sign_elements ">
            <div class="logo">
              <a href="/">
                <img src="/assets/icons/blackGreen_logo_icon.svg">
              </a>
            </div>
            <div class="sign_content">
              <div class="sign_text">
                <div class="signText_title">Login</div>
                <div class="signText_secondary">Login to access your Golobe account</div>
              </div>
              <div class="sign_mainElements">
                <form class="sign_form">
                  <div class="sign_inputs">
                    <fieldset class="emailFieldset" name="email">
                      <legend>Email</legend>
                      <input type="email" name="email" placeholder="Enter your email" required>
                    </fieldset>
                    
                    <fieldset class="passwordFieldset" name="password">
                      <legend>Password</legend>
                      <input type="password" name="password" id="password1" placeholder="Enter your password" minlength="6" required>
                      <span id="eye" onclick="hidePassword(1)">
                        <i class="fa fa-eye-slash" id="hide1"></i>
                        <i class="fa fa-eye" id="view1" style="display: none;"></i>
                      </span>
                    </fieldset>
                    <div class="sign_secondaryInputs">
                      <div class="remeber_me">
                        <input type="checkbox">
                        <div>Remember me</div>
                      </div>
                      <a href="recoverpass_email.php" class="link">Forgot Password</a>
                    </div>
                    <?php
                      if ($_SESSION['success_msg']) {
                        echo '<p class="msg success_msg"> ' . $_SESSION['success_msg'] . ' </p>';
                      }
                      unset($_SESSION['success_msg']);
                    ?>
                    <p class="msg warning_msg none"></p>
                    
                  </div>
                  <div class="sign_submit">
                    <button type="submit" id="login_btn" class="sign_submit_btn">Login</button>
                    <div class="sign_submitSecondary">
                      <div>Don’t have an account?</div><div>&nbsp;</div><a href="sign_up.php" class="link">Sign Up</a>
                    </div>
                  </div>
                </form>
                <div class="anotherSign_text">
                  <div class="horizontal_line"></div>
                  <div class="signText_secondary nowrap">Or login with</div>
                  <div class="horizontal_line"></div>
                </div>
                <div class="anotherSign_btns">
                  <button class="btn sign_facebook_btn">
                    <img src="/assets/icons/facebook_icon.svg">
                  </button>
                  <button class="btn sign_google_btn">
                    <img src="/assets/icons/social media/google_icon.svg">
                  </button>
                  <button class="btn sign_apple_btn">
                    <img src="/assets/icons/social media/blackApple_icon.svg">
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block" src="/assets/imgs/sign_carouselImg1.svg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="/assets/imgs/sign_carouselImg2.svg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="/assets/imgs/sign_carouselImg3.svg" alt="Third slide">
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="/js/sign.js"></script>
  </body>
</html>

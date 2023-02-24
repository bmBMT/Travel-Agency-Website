<?php
  session_start();
  require '../vendor/connect.php';
  if ($_SESSION['user']) {
    header('Location: /');
  }
  $change_key = $_GET['key'];
  $check_key = mysqli_query($connect, "SELECT * FROM `users` WHERE `change_key` = '$change_key'");
  if (mysqli_num_rows($check_key) === 0) {
    header('Location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="/styles/sign_style.css" />
    <link rel="icon" href="/assets/icons/title_icon.svg" />
    <title>Travel Agency Website — Set Password</title>
  </head>

  <body>
    <div class="forgot container">
      <div class="sign_contain">
        <div class="sign_elements ">
          <div class="logo">
            <a href="/">
              <img src="/assets/icons/blackGreen_logo_icon.svg">
            </a>
          </div>
            <div class="sign_content">
              <div class="sign_text">
                <div class="signText_title">Set a password</div>
                <div class="signText_secondary">Your previous password has been reseted. Please set a new password for your account.</div>
              </div>
              <div class="sign_mainElements">
                <form class="sign_form">
                  <div class="sign_inputs">
                    <fieldset class="passwordFieldset" name="password">
                        <input type="hidden" name="change_key" value="<?php echo $change_key ?>">
                        <legend>Create Password</legend>
                        <input type="password" name="password" id="password1" placeholder="Enter your new password" minlength="6" required>
                        <span id="eye" onclick="hidePassword(1)">
                          <i class="fa fa-eye-slash" id="hide1"></i>
                          <i class="fa fa-eye" id="view1" style="display: none;"></i>
                        </span>
                      </fieldset>
                      
                      <fieldset id="password_confirmFieldset" name="password_confirm">
                          <legend id="password_confirmLegend">Re-enter Password</legend>
                          <input type="password" name="password_confirm" id="password2" placeholder="Re-enter your new password" required>
                          <span id="eye" onclick="hidePassword(2)">
                            <i class="fa fa-eye-slash" id="hide2"></i>
                            <i class="fa fa-eye" id="view2" style="display: none;"></i>
                          </span>
                      </fieldset>
                      <p class="msg warning_msg none"></p>
                  </div>
                  <div class="sign_submit">
                    <button type="submit" id="setpass_btn" class="sign_submit_btn">Set password</button>
                  </div>
                </form>
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
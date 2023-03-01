<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/header_style.css" />
  </head>

  <body>
  <header class="header" id="header" style="color: black;">
        <div class="container">
            <div class="content" id="head_content">
              <div class="sections">
                <a href="#" class="link">
                  <img src="/assets/icons/black_airplane_icon.svg" id="head_airPlane_icon"/>Find Flight
                </a>
                <a href="#" class="link">
                  <img src="/assets/icons/black_bed_icon.svg" id="head_bed_icon"/>Find Stays
                </a>
              </div>
      
              <a href="/index.php" class="logo">
                <img src="/assets/icons/blackGreen_logo_icon.svg" id="logo_icon"/>
              </a>
              <?php 
                if (!$_SESSION['user'])
                { ?>
                  <div class="buttons" id="unlogined_btns">
                    <a href="/pages/login.php">
                      <button class="btn login" id="login_btn" style="color: black;">Login</button>
                    </a>
                    <a href="/pages/sign_up.php">
                      <button class="btn sign_up btn_black" id="sign_up_btn">Sign up</button>
                    </a>
                  </div> <?php
                } ?> <?php
                if ($_SESSION['user'])
                { ?>
                  <div class="logined_elements" id="logined_elements">
                    <div class="favourites_link">
                      <a href="#" class="link">
                        <img src="/assets/icons/black_heart_icon.svg" id="heart_icon">
                        <div class="favourites_text">
                            Favourites
                        </div>
                      </a>
                      <span class="vertical_line"></span>
                    </div>
                    <div class="dropdown">
                      <div class="profile">
                        <button class="avatar" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);">
                          <div class="arrowDown <?= $_SESSION['user']['role'] ?>">
                            <box-icon name='chevron-down'></box-icon>
                          </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2" >
                          <div class="column">
                            <div class="profile">
                              <div class="avatar"  style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
                              <div class="status_text">
                                <div class="name"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></div>
                                <div class="profile_status">Online</div>
                              </div>
                            </div>
                            <hr />
                            <section class="dropDown_links">
                              <a href="/pages/account.php" class="dropDown_link">
                                <div class="dropDown_link_content">
                                <img src="/assets/icons/user_icon.svg">
                                <div class="dropDown_text">My account</div>
                                </div>
                                <img src="/assets/icons/black_arrowRight.svg" />
                              </a>
                              <a href="#" class="dropDown_link">
                                <div class="dropDown_link_content">
                                  <img src="/assets/icons/card_icon.svg" />
                                  <div class="dropDown_text">Payments</div>
                                </div>
                                <img src="/assets/icons/black_arrowRight.svg" />
                              </a>
                              <a href="#" class="dropDown_link">
                                <div class="dropDown_link_content">
                                  <img src="/assets/icons/settings_icon.svg" />
                                  <div class="dropDown_text">Settings</div>
                                </div>
                                <img src="/assets/icons/black_arrowRight.svg" />
                              </a>
                            </section>
                            <hr />
                            <section class="dropDown_links">
                              <a href="#" class="dropDown_link">
                                <div class="dropDown_link_content">
                                  <img src="/assets/icons/support_icon.svg" />
                                  <div class="dropDown_text">Support</div>
                                </div>
                                <img src="/assets/icons/black_arrowRight.svg" />
                              </a>
                              <a href="/vendor/logout.php" class="dropDown_link">
                                <div class="dropDown_link_content">
                                  <img src="/assets/icons/logout_icon.svg" />
                                  <div class="dropDown_text">Logout</div>
                                </div>
                              </a>
                            </section>
                          </div>
                        </div>
                        <div class="name"><?= $_SESSION['user']['first_name'] . " " . mb_substr($_SESSION['user']['last_name'], 0, 2) . "." ?></div>
                      </div>
                    </div>
                  </div> <?php
                }
              ?>
            </div>
        </div>
    </header>
</html>

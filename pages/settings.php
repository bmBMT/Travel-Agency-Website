<?php
session_start();
require '../vendor/connect.php';
if (!$_SESSION['user']) {
  header('Location: /');
}

$email = $_SESSION['user']['email'];
$payment = mysqli_query($connect, "SELECT * FROM `payments` WHERE `email` = '$email'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.4/js/tether.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="/styles/style.css" />
  <link rel="stylesheet" href="/styles/footer_style.css" />
  <link rel="stylesheet" href="/styles/header_style.css" />
  <link rel="stylesheet" href="/styles/account.css">
  <link rel="stylesheet" href="/styles/img-backgrounds.css">
  <link rel="icon" href="/assets/icons/title_icon.svg" />
  <title>Travel Agency Website — Settings</title>
</head>

<body>
  <header class="header" id="header" style="color: black;">
    <div class="container">
      <div class="content" id="head_content">
        <div class="sections">
          <a href="/pages/flight-search.php" class="link">
            <img src="/assets/icons/black_airplane_icon.svg" id="head_airPlane_icon" />Find Flight
          </a>
          <a href="/pages/hotel-search.php" class="link">
            <img src="/assets/icons/black_bed_icon.svg" id="head_bed_icon" />Find Stays
          </a>
        </div>

        <a href="/index.php" class="logo">
          <img src="/assets/icons/blackGreen_logo_icon.svg" id="logo_icon" />
        </a>
        <?php
        if (!$_SESSION['user']) { ?>
          <div class="buttons" id="unlogined_btns">
            <a href="/pages/login.php">
              <button class="btn login" id="login_btn" style="color: black;">Login</button>
            </a>
            <a href="/pages/sign_up.php">
              <button class="btn sign_up btn_black" id="sign_up_btn">Sign up</button>
            </a>
          </div> <?php
                } ?> <?php
                      if ($_SESSION['user']) { ?>
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
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                  <div class="column">
                    <div class="profile">
                      <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
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
                      <a href="/pages/payments.php" class="dropDown_link">
                        <div class="dropDown_link_content">
                          <img src="/assets/icons/card_icon.svg" />
                          <div class="dropDown_text">Payments</div>
                        </div>
                        <img src="/assets/icons/black_arrowRight.svg" />
                      </a>
                      <a href="/pages/settings.php" class="dropDown_link">
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

  <div class="container">
    <div class="profile_head">
      <div class="profile_bg" style="background: url(<?= '/' . $_SESSION['user']['bg'] ?>);"></div>
      <form action="/vendor/account.php" method="post" enctype="multipart/form-data" id="bg_form">
        <div class="btn bg_btn show_btn black_color" onclick="getBg()">
          <i class="fa fa-cloud-arrow-up"></i>
          Upload new cover
        </div>
        <div style='height: 0px;width: 0px; overflow:hidden;'><input name="bg" id="_upfile" type="file" onchange="_sub(this)" /></div>
      </form>
    </div>
    <div class="account_elements">
      <div class="container">
        <div class="profile">
          <div class="avatar <?= $_SESSION['user']['role'] ?>" id="big_avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>)">
            <form action="/vendor/account.php" method="post" enctype="multipart/form-data" id="avatar_form">
              <div class="arrowDown  <?= $_SESSION['user']['role'] ?>" id="arrowDown" onclick="getAvatar()">
                <img src="/assets/icons/pen_icon.svg">
              </div>
              <div style='height: 0px;width: 0px; overflow:hidden;'><input name="avatar" id="upfile" type="file" onchange="sub(this)" /></div>
            </form>
          </div>
          <div class="profileText">
            <div class="name"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></div>
            <div class="profileDescription"><?= $_SESSION['user']['email'] ?></div>
            <?php
            if ($_SESSION['file_msg']) {
              echo '<p class="msg warning_msg"> ' . $_SESSION['file_msg'] . ' </p>';
            }
            unset($_SESSION['file_msg']);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container account_content">
    <div id="account">
      <div class="stage_title">Account</div>
      <div class="window">
        <div class="_row">
          <div class="rowText" id="nameText">
            <div class="rowName">Name</div>
            <div class="rowData" id="nameData"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></div>
          </div>
          <button class="edit_btn" id="name_btn">
            <img src="/assets/icons/edit_icon.svg">
            <div class="edit_btn-text">Change</div>
          </button>
        </div>
        <div class="_row">
          <div class="rowText" id="emailText">
            <div class="rowName">Email</div>
            <div class="rowData" id="emailData"><?= $_SESSION['user']['email'] ?></div>
            <?php
            if ($_SESSION['email_msg']) {
              echo '<p class="msg warning_msg"> ' . $_SESSION['email_msg'] . ' </p>';
            }
            unset($_SESSION['email_msg']);
            ?>
          </div>
          <button class="edit_btn" id="email_btn">
            <img src="/assets/icons/edit_icon.svg">
            <div class="edit_btn-text">Change</div>
          </button>
        </div>
        <div class="_row">
          <div class="rowText" id="passwordText">
            <div class="rowName">Password</div>
            <div class="rowData" id="passwordData"><?= str_repeat("*", strlen($_SESSION['user']['password'])) ?></div>
            <?php
            if ($_SESSION['pass_msg']) {
              echo '<p class="msg warning_msg"> ' . $_SESSION['pass_msg'] . ' </p>';
            }
            unset($_SESSION['pass_msg']);
            ?>
          </div>
          <button class="edit_btn" id="password_btn">
            <img src="/assets/icons/edit_icon.svg">
            <div class="edit_btn-text">Change</div>
          </button>
        </div>
        <div class="_row">
          <div class="rowText" id="phoneText">
            <div class="rowName">Phone number</div>
            <div class="rowData" id="phoneData"><?= $_SESSION['user']['phone'] ?></div>
          </div>
          <button class="edit_btn" id="phone_btn">
            <img src="/assets/icons/edit_icon.svg">
            <div class="edit_btn-text">Change</div>
          </button>
        </div>
        <div class="_row">
          <div class="rowText" id="addressText">
            <div class="rowName">Address</div>
            <div class="rowData" id="addressData"><?= $_SESSION['user']['address'] ?></div>
          </div>
          <button class="edit_btn" id="address_btn">
            <img src="/assets/icons/edit_icon.svg">
            <div class="edit_btn-text">Change</div>
          </button>
        </div>
        <div class="_row">
          <div class="rowText">
            <div class="rowName">Data of birth</div>
            <div class="rowData" type="password"><?= $_SESSION['user']['birth'] ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="footer_content">
        <div class="footer_card">
          <div class="content">
            <h2 class="footer_h2">Subscribe<br />Newsletter</h2>
            <div class="card_content">
              <div class="text">
                <h3 class="footer_h3">The Travel</h3>
                <p class="footer_p">
                  Get inspired! Receive travel discounts, tips and behind the
                  scenes stories.
                </p>
              </div>
              <div class="footer_input">
                <input type="email" class="footer_getEmail" placeholder="Your email address" />
                <button class="btn footer_getEmail_btn">Subscribe</button>
              </div>
            </div>
          </div>
          <img src="/assets/imgs/footer_card_figure.svg" class="footer_card_img" />
        </div>
        <div class="row footer_links">
          <div class="icon_links">
            <a href="index.php">
              <img src="/assets/icons/blackWhite_logo_icon.svg" class="footer_logo" />
            </a>
            <div class="socialMedia_links">
              <a href="#">
                <img src="/assets/icons/social media/blackFacebook_icon.svg" class="socialMedia_icon" />
              </a>
              <a href="#">
                <img src="/assets/icons/social media/twitter_icon.svg" class="socialMedia_icon" />
              </a>
              <a href="#">
                <img src="/assets/icons/social media/youtube_icon.svg" class="socialMedia_icon" />
              </a>
              <a href="#">
                <img src="/assets/icons/social media/instagram_icon.svg" class="socialMedia_icon" />
              </a>
            </div>
          </div>
          <div class="text_links">
            <div class="column">
              <p class="columnLinks_h">Our Destinations</p>
              <div class="links">
                <a href="#" class="footer_link">Canada</a>
                <a href="#" class="footer_link">Alaksa</a>
                <a href="#" class="footer_link">France</a>
                <a href="#" class="footer_link">Iceland</a>
              </div>
            </div>
            <div class="column">
              <p class="columnLinks_h">Our Activities</p>
              <div class="links">
                <a href="#" class="footer_link">Northern Lights</a>
                <a href="#" class="footer_link">Cruising & sailing</a>
                <a href="#" class="footer_link">Multi-activities</a>
                <a href="#" class="footer_link">Kayaing</a>
              </div>
            </div>
            <div class="column">
              <p class="columnLinks_h">Travel Blogs</p>
              <div class="links">
                <a href="#" class="footer_link">Bali Travel Guide</a>
                <a href="#" class="footer_link">Sri Lanks Travel Guide</a>
                <a href="#" class="footer_link">Peru Travel Guide</a>
                <a href="#" class="footer_link">Bali Travel Guide</a>
              </div>
            </div>
            <div class="column">
              <p class="columnLinks_h">About Us</p>
              <div class="links">
                <a href="#" class="footer_link">Our Story</a>
                <a href="#" class="footer_link">Work with us</a>
              </div>
            </div>
            <div class="column">
              <p class="columnLinks_h">Contact Us</p>
              <div class="links">
                <a href="#" class="footer_link">Our Story</a>
                <a href="#" class="footer_link">Work with us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="/js/main.js"></script>
  <script src="/js/accountManage.js"></script>
  <script src="/js/card-validator.js"></script>
</body>

</html>
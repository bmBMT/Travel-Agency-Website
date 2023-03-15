<?php
session_start();
require '../vendor/connect.php';

if ($_SESSION['user']) {
  $email = $_SESSION['user']['email'];
  $payment = mysqli_query($connect, "SELECT * FROM `payments` WHERE `email` = '$email'");
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="/styles/style.css" />
  <link rel="stylesheet" href="/styles/footer_style.css" />
  <link rel="stylesheet" href="/styles/header_style.css" />
  <link rel="stylesheet" href="/styles/img-backgrounds.css">
  <link rel="stylesheet" href="/styles/account.css">
  <link rel="stylesheet" href="/styles/stage-detail.css">
  <link rel="stylesheet" href="/styles/ticket-detail.css">
  <link rel="icon" href="/assets/icons/title_icon.svg" />
  <title>Travel Agency Website — Booking</title>
</head>

<body id="hotel">
  <header class="header" id="header" style="color: black;">
    <div class="container">
      <div class="content" id="head_content">
        <div class="sections">
          <a href="/pages/flight-search.php" class="link">
            <img src="/assets/icons/black_airplane_icon.svg" id="head_airPlane_icon" />Find Flight
          </a>
          <a href="/pages/hotel-search.php" class="link">
            <img src="/assets/icons/black_bed_icon.svg" id="head_bed_icon" />Find Stays
            <div class="horizontal_line" id="stage_line"></div>
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
          </div>
        <?php
        } ?>
        <?php
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
                        <div class="name">
                          <?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?>
                        </div>
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
                <div class="name">
                  <?= $_SESSION['user']['first_name'] . " " . mb_substr($_SESSION['user']['last_name'], 0, 2) . "." ?>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </header>

  <div class="detail-content container" style="gap: 40px;">
    <div class="row al-center w-100">
      <div class="col g-16">
        <div class="row g-16 text-title">CVK Park Bosphorus Hotel Istanbul</div>
        <div class="row g-4" style="flex-wrap: nowrap;">
          <i class="fa-solid fa-location-dot"></i>
          <div class="icon-text">Gümüssuyu Mah. Inönü Cad. No:8, Istanbul 34437</div>
        </div>
      </div>
      <div class="col g-16" id="airplane-btns">
        <div id="airplane-price">$265</div>
        <div class="row g-15 jc-end">
          <button class="border-btn"><i class="fa-solid fa-share-nodes"></i></button>
          <button class="show_btn" id="download-btn">Download</button>
        </div>
      </div>
    </div>
    <div class="col g-64">
      <div class="download-ticket">
        <div class="ticket">
          <div class="date-time-info">
            <div class="col g-4">
              <div class="date-time-title">Thur, Dec 8</div>
              <div class="date-time-about">Check-In</div>
            </div>
            <div class="col g-8 al-center">
              <img src="/assets/icons/ticket_arrow.svg" style="transform: rotateX(180deg);">
              <img class="date-time-icon" src="/assets/icons/black_building_icon.svg">
              <img src="/assets/icons/ticket_arrow.svg">
            </div>
            <div class="col g-4">
              <div class="date-time-title">Fri, Dec 9</div>
              <div class="date-time-about">Check-Out</div>
            </div>
          </div>
          <div class="mainInfo-ticket">
            <div>
              <div class="ticket-head">
                <div class="row g-16 al-center" id="user">
                  <div class="avatar <?= $_SESSION['user']['role'] ?>" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>)">
                  </div>
                  <div class="window-head-text"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></div>
                </div>
                <div class="ticket-head-text">Superior room - 1 double bed or 2 twin beds</div>
              </div>
              <div class="ticket-body">
                <div class="row g-8">
                  <img class="ticket-body-img" src="/assets/icons/timmer.svg">
                  <div class="col">
                    <div class="ticket-body-data">Chech-In time</div>
                    <div class="ticket-body-value">12:00pm</div>
                  </div>
                </div>
                <div class="row g-8">
                  <img class="ticket-body-img" src="/assets/icons/timmer.svg">
                  <div class="col">
                    <div class="ticket-body-data">Check-In out</div>
                    <div class="ticket-body-value">11:30am</div>
                  </div>
                </div>
                <div class="row g-8">
                  <img class="ticket-body-img" src="/assets/icons/door.svg">
                  <div class="col">
                    <div class="ticket-body-data">Room no.</div>
                    <div class="ticket-body-value">On arrival</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="ticket-footer">
              <div class="col g-4" id="ticket-fly-info">
                <div class="date-time-title" id="airline-from">EK</div>
                <div class="date-time-about" id="fly-number">ABC12345</div>
              </div>
              <img src="/assets/imgs/ticket-barcode.svg" id="ticket-barcode">
            </div>
          </div>
        </div>
        <div class="secondInfo-ticket cvk_istanbul"></div>
      </div>
      <div class="col g-34">
        <div class="text-title">Terms and Conditions</div>
        <div class="col g-16">
          <div class="window-head-text" style="font-weight: 500;">Payments</div>
          <div class="text-about">
            <div>·</div>If you are purchasing your ticket using a debit or credit card via the Website, we will process these payments via the automated secure common payment gateway which will be subject to fraud screening purposes.
          </div>
          <div class="text-about">
            <div>·</div>If you do not supply the correct card billing address and/or cardholder information, your booking will not be confirmed and the overall cost may increase. We reserve the right to cancel your booking if payment is declined for any reason or if you have supplied incorrect card information. If we become aware of, or is notified of, any fraud or illegal activity associated with the payment for the booking, the booking will be cancelled and you will be liable for all costs and expenses arising from such cancellation, without prejudice to any action that may be taken against us.
          </div>
          <div class="text-about">
            <div>·</div>Golobe may require the card holder to provide additional payment verification upon request by either submitting an online form or visiting the nearest Golobe office, or at the airport at the time of check-in. Golobe reserves the right to deny boarding or to collect a guarantee payment (in cash or from another credit card) if the card originally used for the purchase cannot be presented by the cardholder at check-in or when collecting the tickets, or in the case the original payment has been withheld or disputed by the card issuing bank. Credit card details are held in a secured environment and transferred through an internationally accepted system.
          </div>
        </div>
        <div class="col g-16">
          <div class="window-head-text" style="font-weight: 500;">Contact Us</div>
          <div>
            <div class="text-about">If you have any questions about our Website or our Terms of Use, please contact:</div>
            <div class="text-about">Golobe Group Q.C.S.C</div>
            <div class="text-about">Golobe Tower</div>
            <div class="text-about">P.O. Box: 22550</div>
            <div class="text-about">Doha, State of Qatar</div>
            <div class="text-about">Further contact details can be found at golobe.com/help</div>
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
</body>
<script src="/js/main.js"></script>
<script src="/js/booking.js"></script>

</html>
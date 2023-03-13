<?php
session_start();
require '../vendor/connect.php';
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
  <link rel="stylesheet" href="/styles/stage-detail.css">
  <link rel="icon" href="/assets/icons/title_icon.svg" />
  <title>Travel Agency Website — Hotel</title>
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

  <div class="detail-content container">
    <div class="row w-100">
      <div class="col g-16">
        <div class="row g-16 text-title">
          CVK Park Bosphorus Hotel Istanbul
          <div class="row g-4 al-center">
            <div class="row g-0">
              <i class="fa fa-star hotel-star"></i>
              <i class="fa-solid fa-star hotel-star"></i>
              <i class="fa-solid fa-star hotel-star"></i>
              <i class="fa-solid fa-star hotel-star"></i>
              <i class="fa-solid fa-star hotel-star"></i>
            </div>
            <div class="icon-text" style="opacity: 1;">5 Star Hotel</div>
          </div>
        </div>
        <div class="col g-8">
          <div class="row g-4" style="flex-wrap: nowrap;">
            <i class="fa-solid fa-location-dot"></i>
            <div class="icon-text">Gümüssuyu Mah. Inönü Cad. No:8, Istanbul 34437</div>
          </div>
          <div class="row g-8" style="height: 32px">
            <div class="card-grade">4.2</div>
            <div class="review-text"><span style="font-weight: 700;">Very Good</span>&#160;371 reviews</div>
          </div>
        </div>
      </div>
      <div class="col g-16" id="airplane-btns">
        <div id="airplane-price">$240<spa style="font-size: 14px;">/night</span></div>
        <div class="row g-15 jc-end">
          <button class="border-btn"><i class="fa-regular fa-heart"></i></button>
          <button class="border-btn"><i class="fa-solid fa-share-nodes"></i></button>
          <a href="#available-rooms-link">
            <button class="show_btn" id="bookNow-btn">Book now</button>
          </a>
        </div>
      </div>
    </div>
    <div id="hotel-imgs">
      <div data-toggle data-target="#photosModal">
        <img src="/assets/imgs/hotel-detail/1.svg" class="hotel-main-img">
      </div>
      <div class="col g-8 jc-sb">
        <div class="row g-8">
          <div data-toggle data-target="#photosModal">
            <img src="/assets/imgs/hotel-detail/2.svg" class="hotel-img">
          </div>
          <div data-toggle data-target="#photosModal">
            <img src="/assets/imgs/hotel-detail/3.svg" class="hotel-img">
          </div>
        </div>
        <div class="row g-8">
          <div data-toggle data-target="#photosModal">
            <img src="/assets/imgs/hotel-detail/4.svg" class="hotel-img">
          </div>
          <div data-toggle data-target="#photosModal">
            <img src="/assets/imgs/hotel-detail/5.svg" class="hotel-img">
          </div>
        </div>
      </div>
      <button class="show_btn" id="viewAllPhotos" data-toggle="modal" data-target="#photosModal">View all photos</button>
      <div class="modal fade" id="photosModal" tabindex="-1" role="dialog" aria-labelledby="photosModalLabel" aria-hidden="true">
        <div class="modal-dialog container" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-xmark"></i>
              </button>
            </div>
            <div class="modal-body">
              <img src="/assets/imgs/hotel/hotel-1.svg">
              <img src="/assets/imgs/hotel-detail/2.svg">
              <img src="/assets/imgs/hotel-detail/3.svg">
              <img src="/assets/imgs/hotel-detail/4.svg">
              <img src="/assets/imgs/hotel-detail/5.svg">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hotel-detail-content">
      <hr>
      <div class="col g-32" id="overview">
        <div class="window-head-text">Overview</div>
        <div class="default-text">Located in Taksim Gmsuyu, the heart of Istanbul, the CVK Park Bosphorus Hotel Istanbul has risen from the ashes of the historic Park Hotel, which also served as Foreign Affairs Palace 120 years ago and is hosting its guests by assuming this hospitality mission. With its 452 luxurious rooms and suites, 8500 m2 SPA and fitness area, 18 meeting rooms including 4 dividable ones and 3 terraces with Bosphorus view, Istanbuls largest terrace with Bosphorus view (4500 m2) and latest technology infrastructure, CVK Park Bosphorus Hotel Istanbul is destined to be the popular attraction point of the city. Room and suite categories at various sizes with city and Bosphorus view, as well as 68 separate luxury suites, are offered to its special guests as a wide variety of selection.</div>
        <div class="row g-16" id="hotel-features">
          <div class="row g-10" id="hotel-review">
            <div class="col g-32">
              <div class="hotel-feature-title">4.2</div>
              <div class="col g-4">
                <div class="default-text">Very good</div>
                <div class="default-text">371 review</div>
              </div>
            </div>
          </div>
          <div class="row g-10 hotel-feature">
            <div class="col jc-sb">
              <div class="hotel-feature-title"><img src="/assets/icons/stars_icon.svg"></div>
              <div class="default-text">Near park</div>
            </div>
          </div>
          <div class="row g-10 hotel-feature">
            <div class="col jc-sb">
              <div class="hotel-feature-title"><img src="/assets/icons/stars_icon.svg"></div>
              <div class="default-text">Near nightlife</div>
            </div>
          </div>
          <div class="row g-10 hotel-feature">
            <div class="col jc-sb">
              <div class="hotel-feature-title"><img src="/assets/icons/stars_icon.svg"></div>
              <div class="default-text">Near theater</div>
            </div>
          </div>
          <div class="row g-10 hotel-feature">
            <div class="col jc-sb">
              <div class="hotel-feature-title"><img src="/assets/icons/stars_icon.svg"></div>
              <div class="default-text">Near Hotel</div>
            </div>
          </div>
        </div>
        <div id="available-rooms-link"></div>
      </div>
      <hr>
      <div class="col g-32" style="width: 100% !important;" id="available-rooms">
        <div class="window-head-text">Available Rooms</div>
        <div class="col g-16">
          <div class="row g-8 jc-sb">
            <div class="row g-16 al-center room-about">
              <div class="room-img" style="background: url(/assets/imgs/hotel/rooms/1.svg);"></div>
              <div class="default-text" style="opacity: 1;">Superior room - 1 double bed or 2 twin beds</div>
            </div>
            <div class="row g-64 al-center room-book">
              <div class="text-title">$240<span style="font-size: 14px;">/night</span></div>
              <button class="show_btn" id="bookNow-btn">Book now</button>
            </div>
          </div>
          <hr>
          <div class="row g-8 jc-sb">
            <div class="row g-16 al-center room-about">
              <div class="room-img" style="background: url(/assets/imgs/hotel/rooms/2.svg);"></div>
              <div class="default-text" style="opacity: 1;">Superior room - City view - 1 double bed or 2 twin beds</div>
            </div>
            <div class="row g-64 al-center room-book">
              <div class="text-title">$280<span style="font-size: 14px;">/night</span></div>
              <button class="show_btn" id="bookNow-btn">Book now</button>
            </div>
          </div>
          <hr>
          <div class="row g-8 jc-sb">
            <div class="row g-16 al-center room-about">
              <div class="room-img" style="background: url(/assets/imgs/hotel/rooms/3.svg);"></div>
              <div class="default-text" style="opacity: 1;">Superior room - City view - 1 double bed or 2 twin beds</div>
            </div>
            <div class="row g-64 al-center room-book">
              <div class="text-title">$320<span style="font-size: 14px;">/night</span></div>
              <button class="show_btn" id="bookNow-btn">Book now</button>
            </div>
          </div>
          <hr>
          <div class="row g-8 jc-sb">
            <div class="row g-16 al-center room-about">
              <div class="room-img" style="background: url(/assets/imgs/hotel/rooms/4.svg);"></div>
              <div class="default-text" style="opacity: 1;">Superior room - City view - 1 double bed or 2 twin beds</div>
            </div>
            <div class="row g-64 al-center room-book">
              <div class="text-title">$350<span style="font-size: 14px;">/night</span></div>
              <button class="show_btn" id="bookNow-btn">Book now</button>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="col g-32" id="amenities">
        <div class="window-head-text">Amenities</div>
        <div class="hotel-amenutues-column">
          <div class="hotel-amenities">
            <div class="row g-8">
              <i class="fa-solid fa-water-ladder"></i>
              <div class="default-text" style="opacity: 1;">Outdoor pool</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-water-ladder"></i>
              <div class="default-text" style="opacity: 1;">Indoor pool</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-spa"></i>
              <div class="default-text" style="opacity: 1;">Spa and wellness center</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-utensils"></i>
              <div class="default-text" style="opacity: 1;">Restaurant</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-bell-concierge"></i>
              <div class="default-text" style="opacity: 1;">Room service</div>
            </div>
          </div>
          <div class="hotel-amenities">
            <div class="row g-8">
              <i class="fa-solid fa-dumbbell"></i>
              <div class="default-text" style="opacity: 1;">Fitness center</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-wine-glass"></i>
              <div class="default-text" style="opacity: 1;">Bar/Lounge</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-wifi"></i>
              <div class="default-text" style="opacity: 1;">Free Wi-Fi</div>
            </div>
            <div class="row g-8">
              <i class="fa-solid fa-mug-saucer"></i>
              <div class="default-text" style="opacity: 1;">Tea/coffee machine</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col g-24" id="reviews">
        <div class="col g-24">
          <div class="row g-24 jc-sb">
            <div class="window-head-text">Reviews</div>
            <button class="show_btn" data-toggle="modal" data-target="#reviewModal">Give your review</button>
            <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
              <div class="modal-dialog container" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="fa fa-xmark"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="starRating">
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <input type="text" hidden>
                      <div class="review-rating" style="font-size: 16px; margin-left: 8px;"></div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Write your review</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      <p class="msg warning_msg none"></p>
                    </div>
                    <button class="show_btn" id="postReview">Post a review</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-16">
            <div class="reviews-title">4.2</div>
            <div class="col g-8">
              <div class="window-head-text">Very good</div>
              <div class="default-text" style="opacity: 1;">371 verified reviews</div>
            </div>
          </div>
          <hr>
          <div class="col g-24">
            <div class="review">
              <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
              <div class="col g-8">
                <div class="row g-8">
                  <div class="review-rating">5.0 Amazing</div>
                  <div class="vertical-line"></div>
                  <div class="review-text">Omar Siphron</div>
                </div>
                <div class="review-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <i class="fa-solid fa-flag"></i>
            </div>
            <hr>
            <div class="review">
              <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
              <div class="col g-8">
                <div class="row g-8">
                  <div class="review-rating">5.0 Amazing</div>
                  <div class="vertical-line"></div>
                  <div class="review-text">Omar Siphron</div>
                </div>
                <div class="review-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <i class="fa-solid fa-flag"></i>
            </div>
            <hr>
            <div class="review">
              <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
              <div class="col g-8">
                <div class="row g-8">
                  <div class="review-rating">5.0 Amazing</div>
                  <div class="vertical-line"></div>
                  <div class="review-text">Omar Siphron</div>
                </div>
                <div class="review-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <i class="fa-solid fa-flag"></i>
            </div>
            <hr>
            <div class="review">
              <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
              <div class="col g-8">
                <div class="row g-8">
                  <div class="review-rating">5.0 Amazing</div>
                  <div class="vertical-line"></div>
                  <div class="review-text">Omar Siphron</div>
                </div>
                <div class="review-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <i class="fa-solid fa-flag"></i>
            </div>
            <hr>
            <div class="review">
              <div class="avatar" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);"></div>
              <div class="col g-8">
                <div class="row g-8">
                  <div class="review-rating">5.0 Amazing</div>
                  <div class="vertical-line"></div>
                  <div class="review-text">Omar Siphron</div>
                </div>
                <div class="review-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <i class="fa-solid fa-flag"></i>
            </div>
            <hr>
            <div class="review-scroller">
              <i class="fa-solid fa-chevron-left"></i>
              <div class="review-text">1 of 40</div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
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
<script src="/js/hotel-detail.js"></script>

</html>
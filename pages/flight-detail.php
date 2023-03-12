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
    <title>Travel Agency Website — Flight</title>
</head>

<body id="flight">
    <header class="header" id="header" style="color: black;">
        <div class="container">
            <div class="content" id="head_content">
                <div class="sections">
                    <a href="/pages/flight-search.php" class="link">
                        <img src="/assets/icons/black_airplane_icon.svg" id="head_airPlane_icon" />Find Flight
                        <div class="horizontal_line" id="stage_line"></div>
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
            <div class="col g-16" id="airplane-about">
                <div class="text-title">Emirates A380 Airbus</div>
                <div class="col g-8">
                    <div class="row g-4" style="flex-wrap: nowrap;">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="icon-text">Gümüssuyu Mah. Inönü Cad. No:8, Istanbul 34437</div>
                    </div>
                    <div class="row g-8" style="height: 32px">
                        <div class="card-grade">4.2</div>
                        <div class="review-text"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                    </div>
                </div>
            </div>
            <div class="col g-16" id="airplane-btns">
                <div id="airplane-price">$240</div>
                <div class="row g-15 jc-end">
                    <button class="border-btn"><i class="fa-regular fa-heart"></i></button>
                    <button class="border-btn"><i class="fa-solid fa-share-nodes"></i></button>
                    <button class="show_btn" id="bookNow-btn">Book now</button>
                </div>
            </div>
        </div>
        <div id="airplane-img"></div>
        <div class="col g-40" style="width: 100% !important;">
            <div class="col g-24">
                <div class="row w-100" id="selectClass">
                    <div class="text-title" id="ticketClass">Basic Economy Features</div>
                    <div class="row g-24">
                        <div class="checkbox-row">
                            <input type="checkbox" value="Economy" data-single-check checked>
                            <div class="checkbox-text">Economy</div>
                        </div>
                        <div class="checkbox-row">
                            <input type="checkbox" value="First Class" data-single-check>
                            <div class="checkbox-text">First Class</div>
                        </div>
                        <div class="checkbox-row">
                            <input type="checkbox" value="Business Class" data-single-check>
                            <div class="checkbox-text">Business Class</div>
                        </div>
                    </div>
                </div>
                <div id="ticketClass-imgs">
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/1.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/2.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/3.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/4.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/9.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/6.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/7.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/8.svg);"></div>
                    <div class="features-img" style="background: url(/assets/imgs/features-imgs/5.svg);"></div>
                </div>
            </div>
            <div id="airline-policies">
                <div class="text-title">Emirates Airlines Policies</div>
                <div class="row jc-sb" style="flex-wrap: nowrap;">
                    <div class="policies-icon-row">
                        <i class="fa-solid fa-stopwatch"></i>
                        <div class="default-text">Pre-flight cleaning, installation of cabin HEPA filters.</div>
                    </div>
                    <div class="policies-icon-row">
                        <i class="fa-solid fa-stopwatch"></i>
                        <div class="default-text">Pre-flight health screening questions.</div>
                    </div>
                </div>
            </div>
            <div class="window">
                <div class="window-head w-100">
                    <div class="window-head-text">Return Wed, Dec 8</div>
                    <div class="window-head-text" style="font-weight: 500; opacity: 0.75;">2h 28m</div>
                </div>
                <div class="window-body w-100">
                    <div class="row jc-sb w-100">
                        <div class="airline-about">
                            <div class="airline-logo emirates-sm"></div>
                            <div class="col g-8">
                                <div class="text-title">Emirates</div>
                                <div class="airline-airplane">Airbus A320</div>
                            </div>
                        </div>
                        <div class="row g-20 flight-services">
                            <img src="/assets/icons/black_airplane_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/wifi_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/stopwatch_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/fast-food_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/seat-recline_icon.svg">
                        </div>
                    </div>
                    <div class="row g-80 flight-time">
                        <div class="row g-16 al-center">
                            <div class="text-title">12:00 pm</div>
                            <div class="default-text" style="opacity: 0.6;">Newark(EWR)</div>
                        </div>
                        <div class="row g-24 al-center">
                            <img src="/assets/icons/circle-arrow.svg">
                            <img src="/assets/icons/black_big-airplane_icon.svg">
                            <img src="/assets/icons/circle-arrow.svg" style="transform: rotateY(180deg);">
                        </div>
                        <div class="row g-16 al-center">
                            <div class="text-title">12:00 pm</div>
                            <div class="default-text" style="opacity: 0.6;">Newark(EWR)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="window">
                <div class="window-head w-100">
                    <div class="window-head-text">Return Wed, Dec 8</div>
                    <div class="window-head-text" style="font-weight: 500; opacity: 0.75;">2h 28m</div>
                </div>
                <div class="window-body w-100">
                    <div class="row jc-sb w-100">
                        <div class="airline-about">
                            <div class="airline-logo emirates-sm"></div>
                            <div class="col g-8">
                                <div class="text-title">Emirates</div>
                                <div class="airline-airplane">Airbus A320</div>
                            </div>
                        </div>
                        <div class="row g-20 flight-services">
                            <img src="/assets/icons/black_airplane_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/wifi_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/stopwatch_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/fast-food_icon.svg">
                            <div class="vertical-separator"></div>
                            <img src="/assets/icons/seat-recline_icon.svg">
                        </div>
                    </div>
                    <div class="row g-80 flight-time">
                        <div class="row g-16 al-center">
                            <div class="text-title">12:00 pm</div>
                            <div class="default-text" style="opacity: 0.6;">Newark(EWR)</div>
                        </div>
                        <div class="row g-24 al-center">
                            <img src="/assets/icons/circle-arrow.svg">
                            <img src="/assets/icons/black_big-airplane_icon.svg">
                            <img src="/assets/icons/circle-arrow.svg" style="transform: rotateY(180deg);">
                        </div>
                        <div class="row g-16 al-center">
                            <div class="text-title">12:00 pm</div>
                            <div class="default-text" style="opacity: 0.6;">Newark(EWR)</div>
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
<script src="/js/flight-deteil.js"></script>

</html>
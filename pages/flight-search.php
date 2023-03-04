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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"/>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="/js/search_filter_card.js"></script>
  <link rel="stylesheet" href="/styles/style.css" />
  <link rel="stylesheet" href="/styles/cards.css">
  <link rel="stylesheet" href="/styles/search_filter_card.css" />
  <link rel="stylesheet" href="/styles/footer_style.css" />
  <link rel="stylesheet" href="/styles/header_style.css" />
  <link rel="stylesheet" href="/styles/stage-search.css">
  <link rel="icon" href="/assets/icons/title_icon.svg" />
  <title>Travel Agency Website — Flight</title>
  </head>

  <body>
    <header class="header" id="header" style="color: black;">
      <div class="container">
        <div class="content" id="head_content">
          <div class="sections">
                <a href="/pages/flight-search.php" class="link">
                  <img src="/assets/icons/black_airplane_icon.svg" id="head_airPlane_icon"/>Find Flight
                  <div class="horizontal_line" id="stage_line"></div>
                </a>
                <a href="/pages/hotel-search.php" class="link">
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

    <div class="stageHero">
        <img class="hero-img" src="/assets/imgs/flightMain.svg" alt="">
        <div class="container">
            <div class="stageHero-content">
                <div class="stageHero-title">Make your travel whishlist, we’ll do the rest</div>
                <div class="stageHero-text">Special offers to suit your plan</div>
            </div>
            <div class="search_filter_card black_color">
                <div class="search_filter_content">
                  <div class="search_filter_title">Where are you flying? </div>
                  <div class="search_filter_forms">
                    <div class="flight_input input_filter">
                      <form class="input_filter_stroke">
                        <div class="fieldsets">
                          <fieldset class="from-to">
                            <legend>From - To</legend>
                            <div class="form_content">
                              <div class="input_group">
                                <img src="/assets/icons/swap-horizontal_icon.svg" class="form_icon_left">
                                <select name="from_selector" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                  <option value="Lahore" selected>Lahore</option>
                                  <option value="Karachi">Karachi</option>
                                </select>
                                <span class="group-separator">&mdash;</span>
                                <select name="to_selector" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                  <option value="Lahore">Lahore</option>
                                  <option value="Karachi" selected>Karachi</option>
                                </select>
                              </div>
                            </div>
                          </fieldset>
        
                          <fieldset class="trip">
                            <legend>Trip</legend>
                            <div class="form_content">
                              <div class="input_group">
                                <select name="trip_selector" data-dropup-auto="false" class="selectpicker trip_select">
                                  <option value="Return" selected>Return</option>
                                  <option value="Single">Single</option>
                                </select>
                              </div>
                            </div>
                          </fieldset>
        
                          <fieldset class="departReturn">
                            <legend id="departReturn_legend">Depart - Return</legend>
                            <div class="form_content">
                              <input name="depart_input" autocomplete="off" type="text" class="form-control flight_datepicker" id="depart_datepicker" placeholder="07 Nov 22" onkeypress="return false;" style="caret-color: transparent !important;"  required>
                              <span class="group-separator" id="departReturn_separator">&mdash;</span>
                              <input name="return_input" autocomplete="off" type="text" class="form-control flight_datepicker" id="return_datepicker" placeholder="07 Nov 22" onkeypress="return false;" style="caret-color: transparent !important;"  required>
                            </div>
                          </fieldset>
        
                          <fieldset class="passengerClass w-auto">
                            <legend>Passenger - Class</legend>
                            <div class="form_content">
                              <input name="passengers_input" type="number" class="passenger_input" placeholder="1" min="1" max="10" pattern="" required>
                              <span>Pasanger, </span>
                              <select name="ticketClass_selector" class="selectpicker" data-dropup-auto="false">
                                <option value="Economy" selected>Economy</option>
                                <option value="Premium economy">Premium economy</option>
                                <option value="Business">Business</option>
                                <option value="First class">First class</option>
                              </select>
                            </div>
                          
                          </fieldset>
                        </div>
      
                        <div class="filter_buttons">
                          <button type="button" class="btn addPromoCode_btn black_color">
                            <img src="/assets/icons/black_plus_icon.svg" />
                            Add Promo Code
                          </button>
                          <button type="submit" class="btn showFlight_btn black_color">
                            <img src="/assets/icons/black_paperPlane_icon.svg">
                            Show Flights
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper">
        <div class="container">
            <div class="cards_content cards">
                <div class="cards_head">
                      <div class="cards_about">
                        <div class="cards_about_title">Fall into travel</div>
                        <div class="cards_about_description">Going somewhere to celebrate this season? Whether you’re going home or somewhere to roam, we’ve got the travel tools to get you to your destination.</div>
                      </div>
                      <a href="#">
                        <button type="button" class="btn cards_btn black_color">
                          See all
                        </button>
                      </a>
                </div>
                <div class="row">
                    <div class="md-card" style="background: url(/assets/imgs/trip_cards/Melbourne.svg)">
                        <div class="md-card-content">
                            <div class="md-card-text">
                                <div class="md-card-col-text">
                                    <div class="card_title">Melbourne</div>
                                    <div class="card_description">An amazing journey</div>
                                </div>
                                <div class="md-card-price">$ 700</div>
                            </div>
                            <a href="#">
                                <button class="btn show_btn black_color">Book Flight</button>
                            </a>
                        </div>
                    </div>
                    <div class="md-card" style="background: url(/assets/imgs/trip_cards/Paris.svg)">
                        <div class="md-card-content">
                            <div class="md-card-text">
                                <div class="md-card-col-text">
                                    <div class="card_title">Paris</div>
                                    <div class="card_description">A Paris Adventure</div>
                                </div>
                                <div class="md-card-price">$ 600</div>
                            </div>
                            <a href="#">
                                <button class="btn show_btn black_color">Book Flight</button>
                            </a>
                        </div>
                    </div>
                    <div class="md-card" style="background: url(/assets/imgs/trip_cards/London.svg)">
                        <div class="md-card-content">
                            <div class="md-card-text">
                                <div class="md-card-col-text">
                                    <div class="card_title">London</div>
                                    <div class="card_description">London eye adventure</div>
                                </div>
                                <div class="md-card-price">$ 350</div>
                            </div>
                            <a href="#">
                                <button class="btn show_btn black_color">Book Flight</button>
                            </a>
                        </div>
                    </div>
                    <div class="md-card" style="background: url(/assets/imgs/trip_cards/Columbia.svg)">
                        <div class="md-card-content">
                            <div class="md-card-text">
                                <div class="md-card-col-text">
                                    <div class="card_title">Columbia</div>
                                    <div class="card_description">Amazing streets</div>
                                </div>
                                <div class="md-card-price">$ 700</div>
                            </div>
                            <a href="#">
                                <button class="btn show_btn black_color">Book Flight</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cards_content">
                <div class="cards_head journey">
                    <div class="cards_about">
                      <div class="cards_about_title">Fall into travel</div>
                      <div class="cards_about_description">Going somewhere to celebrate this season? Whether you’re going home or somewhere to roam, we’ve got the travel tools to get you to your destination.</div>
                    </div>
                    <a href="#">
                      <button type="button" class="btn cards_btn black_color">
                        See all
                      </button>
                    </a>
                </div>
                <div class="row" id="journey-row">
                    <div class="journey_window">
                        <div class="journey_window-content">
                            <div class="journey_window-title">
                                <div class="journey_window-title-text">Backpacking Sri Lanka</div>
                                <div class="journey_window-worth">
                                    <div class="journey_window-worth-title">From</div>
                                    <div class="journey_window-worth-price">$700</div>
                                </div>
                            </div>
                            <div class="journey_window-description">Traveling is a unique experience as it's the best way to unplug from the pushes and pulls of daily life. It helps us to forget about our problems, frustrations, and fears at home. During our journey, we experience life in different ways. We explore new places, cultures, cuisines, traditions, and ways of living.</div>
                        </div>
                        <a href="#">
                            <button class="btn show_btn black_color">Book Flight</button>
                        </a>
                    </div>
                    <div class="journey-imgs">
                        <div class="row">
                            <div class="journey-imgs-img" style="background: url(/assets/imgs/journey-imgs/1st.svg);"></div>
                            <div class="journey-imgs-img" style="background: url(/assets/imgs/journey-imgs/2nd.svg);"></div>
                        </div>
                        <div class="row">
                            <div class="journey-imgs-img" style="background: url(/assets/imgs/journey-imgs/3d.svg);"></div>
                            <div class="journey-imgs-img" style="background: url(/assets/imgs/journey-imgs/4s.svg);"></div>
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
                    <input
                      type="email"
                      class="footer_getEmail"
                      placeholder="Your email address"
                    />
                    <button class="btn footer_getEmail_btn">Subscribe</button>
                  </div>
                </div>
              </div>
              <img
                src="/assets/imgs/footer_card_figure.svg"
                class="footer_card_img"
              />
            </div>
            <div class="row footer_links">
              <div class="icon_links">
                <a href="index.php">
                  <img
                    src="/assets/icons/blackWhite_logo_icon.svg"
                    class="footer_logo"
                  />
                </a>
                <div class="socialMedia_links">
                  <a href="#">
                    <img
                      src="/assets/icons/social media/blackFacebook_icon.svg"
                      class="socialMedia_icon"
                    />
                  </a>
                  <a href="#">
                    <img
                      src="/assets/icons/social media/twitter_icon.svg"
                      class="socialMedia_icon"
                    />
                  </a>
                  <a href="#">
                    <img
                      src="/assets/icons/social media/youtube_icon.svg"
                      class="socialMedia_icon"
                    />
                  </a>
                  <a href="#">
                    <img
                      src="/assets/icons/social media/instagram_icon.svg"
                      class="socialMedia_icon"
                    />
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
</html>
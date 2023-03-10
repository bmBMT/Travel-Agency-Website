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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="/js/search_filter_card.js"></script>
  <link rel="stylesheet" href="/styles/style.css" />
  <link rel="stylesheet" href="/styles/search_filter_card.css" />
  <link rel="stylesheet" href="/styles/footer_style.css" />
  <link rel="stylesheet" href="/styles/header_style.css" />
  <link rel="stylesheet" href="/styles/img-backgrounds.css">
  <link rel="stylesheet" href="/styles/stage-listing.css">
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
                    if (!$_SESSION['user'])
                    { ?>
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
              <button class="avatar" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="true" style="background: url(<?= '/' . $_SESSION['user']['avatar'] ?>);">
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

  <div class="listing-content">
    <div class="container">
      <div class="search_filter_card black_color">
        <div class="search_filter_content">
          <div class="search_filter_forms">
            <div class="bed_input input_filter">
              <div class="fieldsets">
                <fieldset class="enterDestination">
                  <legend>Enter Destination</legend>
                  <div class="form_content">
                    <div class="input_group">
                      <img src="/assets/icons/leading_icon.svg" class="form_icon_left">
                      <select name="enterDestination_selector" class="selectpicker" id="bed_input-city"
                        data-live-search="true" data-size="7" data-display="static" data-dropup-auto="false" required>
                        <option value="" selected disabled>Select option</option>
                        <optgroup label="Turkey">
                          <option value="Istanbul, Turkey">Istanbul</option>
                          <option value="Manavgat, Turkey">Manavgat </option>
                          <option value="Kemer, Turkey">Kemer</option>
                        </optgroup>
                        <optgroup label="Russia">
                          <option value="Moscow, Russia">Moscow</option>
                          <option value="St. Petersburg, Russia">St. Petersburg</option>
                          <option value="Anapa, Russia">Anapa</option>
                        </optgroup>
                        <optgroup label="Canada">
                          <option value="Toronto, Canada">Toronto</option>
                          <option value="Kelowna, Canada">Kelowna</option>
                          <option value="Mont Tremblant, Canada">Mont Tremblant</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="checkIn">
                  <legend id="checkIn_legend">Check In</legend>
                  <div class="form_content">
                    <div class="input_group">
                      <input name="checkIn_input" autocomplete="off" type="text" class="form-control bed_datepicker"
                        id="checkIn_datepicker" placeholder="Fri 12/2" onkeypress="return false;"
                        style="caret-color: transparent !important;" required>
                      <img src="/assets/icons/calendar_icon.svg" class="form_icon_right">
                    </div>
                  </div>
                </fieldset>

                <fieldset class="checkOut">
                  <legend>Check Out</legend>
                  <div class="form_content">
                    <div class="input_group">
                      <input name="checkOut_input" autocomplete="off" type="text" class="form-control bed_datepicker"
                        id="checkOut_datepicker" placeholder="Fri 12/2" onkeypress="return false;"
                        style="caret-color: transparent !important;" required>
                      <img src="/assets/icons/calendar_icon.svg" class="form_icon_right">
                    </div>
                  </div>
                </fieldset>

                <fieldset class="enterDestination">
                  <legend>Rooms & Guests</legend>
                  <div class="form_content">
                    <div class="input_group">
                      <box-icon type='solid' name='user' class="form_icon_left"></box-icon>
                      <select name="trip_selector" data-dropup-auto="false" class="selectpicker trip_select">
                        <option value="1 room, 1 guest" selected>1 room, 1 guest</option>
                        <option value="1 room, 2 guests">1 room, 2 guests</option>
                        <option value="1 room, 2 guests">2 room, 2 guests</option>
                      </select>
                    </div>
                  </div>
                </fieldset>

                <button class="btn show_btn" id="search-btn"><img src="/assets/icons/search_icon.svg"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container listing-row">
      <div class="listing-left-content">
        <div class="filter-title">Filters</div>
        <div class="filter">
          <div class="filter-input" id="price">
            <nav class="fold">
              <div class="collapse-title">Price</div>
              <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#priceScroll"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-chevron-up"></i>
              </button>
            </nav>
            <div class="collapse show" id="priceScroll">
              <div class="collapse-content">
                <div class="selector">
                  <div class="data-slider">
                    <div id="slider-range"
                      class="slider-price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <span id="min-price" data-currency="$" class="slider-data">50</span>
                    <span id="max-price" data-currency="$" data-max="1200" class="slider-data">1200</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="filter-input" id="rating">
            <nav class="fold">
              <div class="collapse-title">Rating</div>
              <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#ratingSelect"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-chevron-up"></i>
              </button>
            </nav>
            <div class="collapse show" id="ratingSelect">
              <div class="collapse-content">
                <div class="filter-input-row">
                  <label class="btn">
                    <input type="radio" name="myRadioGroup">
                    <div class="label-bg"></div>
                    <p>0+</p>
                  </label>
                  <label class="btn">
                    <input type="radio" name="myRadioGroup">
                    <div class="label-bg"></div>
                    <p>1+</p>
                  </label>
                  <label class="btn">
                    <input type="radio" name="myRadioGroup">
                    <div class="label-bg"></div>
                    <p>2+</p>
                  </label>
                  <label class="btn">
                    <input type="radio" name="myRadioGroup">
                    <div class="label-bg"></div>
                    <p>3+</p>
                  </label>
                  <label class="btn">
                    <input type="radio" name="myRadioGroup">
                    <div class="label-bg"></div>
                    <p>4+</p>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="filter-connector">
            <div class="filter-input" id="freebies">
              <nav class="fold">
                <div class="collapse-title">Freebies</div>
                <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#freebiesCheckbox"
                  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-chevron-up"></i>
                </button>
              </nav>
              <div class="collapse show" id="freebiesCheckbox">
                <div class="collapse-content">
                  <div class="filter-input-col">
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Free breakfast">
                      <div class="checkbox-text">Free breakfast</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Free parking">
                      <div class="checkbox-text">Free parking</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Free internet">
                      <div class="checkbox-text">Free internet</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Free airport shuttle">
                      <div class="checkbox-text">Free airport shuttle</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Free cancellation">
                      <div class="checkbox-text">Free cancellation</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="filter-input" id="amenities">
              <nav class="fold">
                <div class="collapse-title">Amenities</div>
                <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#amenitiesCheckbox"
                  aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-chevron-up"></i>
                </button>
              </nav>
              <div class="collapse show" id="amenitiesCheckbox">
                <div class="collapse-content">
                  <div class="filter-input-col">
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="24hr front desk">
                      <div class="checkbox-text">24hr front desk</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Air-conditioned">
                      <div class="checkbox-text">Air-conditioned</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Fitness">
                      <div class="checkbox-text">Fitness</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Pool">
                      <div class="checkbox-text">Pool</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="listing-right-content">
        <div class="listing-right-content">
          <div class="listing-separator"></div>
          <div class="window">
            <ul class="anotherFilter nav nav-tabs">
              <li class="nav-item">
                <a class="anotherFilter-link nav-link active" data-toggle="tab" href="#hotels" name="hotels-underline">
                  <div class="anotherFilter-link-title">Hotels</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">257 places</div>
                  </div>
                </a>
              </li>
              <span class="vertical_line"></span>
              <li class="nav-item">
                <a class="anotherFilter-link nav-link" data-toggle="tab" href="#motels" name="hotels-underline">
                  <div class="anotherFilter-link-title">Motels</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">51 places</div>
                  </div>
                </a>
              </li>
              <span class="vertical_line"></span>
              <li class="nav-item">
                <a class="anotherFilter-link nav-link active" data-toggle="tab" href="#resorts" name="hotels-underline">
                  <div class="anotherFilter-link-title">Resorts</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">72 places</div>
                  </div>
                </a>
              </li>
            </ul>
            <div class="horizontal_line-md" id="hotels-underline"></div>
          </div>
          <div class="row">
            <div class="showing-text">Showing 4 of <span style="color: #FF8682;">257 places</span></div>
            <div class="sort_by">Sorted by <span style="font-weight: 600;">Recommendations</span></div>
          </div>
          <div class="listing-cards">
            <div class="window listing-card hotel-card">
              <div class="hotel-img" style="background: url(/assets/imgs/hotel/hotel-1.svg);">
                <div class="hotel-img-counter">9 images</div>
              </div>
              <div class="listing-card-right">
                <div class="listing-right-content listing-hotel">
                  <div class="card-content" style="width: 70%;">
                    <div class="card-title">CVK Park Bosphorus Hotel Istanbul</div>
                    <div class="col g-12">
                      <div class="row g-2" style="flex-wrap: nowrap;">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="listing-card-priceStarting">Gümüssuyu Mah. Inönü Cad. No:8, Istanbul 34437</div>
                      </div>
                      <div class="row g-32">
                        <div class="row g-4">
                          <div class="row g-0">
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                          </div>
                          <div class="listing-card-priceStarting" style="opacity: 1;">5 Star Hotel</div>
                        </div>
                        <div class="row g-4">
                          <i class="fa-solid fa-mug-saucer"></i>
                          <div class="listing-card-priceStarting" style="opacity: 1;"><span style="font-weight: 700;">20+</span> Amenities</div>
                        </div>
                      </div>
                      <div class="row g-8" style="height: 32px">
                        <div class="card-grade">4.2</div>
                        <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$240<span style="font-size: 14px;">/night</span></div>
                    <div class="listing-card-priceStarting" style="text-align: end;">excl. tax</div>
                  </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="filter-input-row" style="flex-wrap: nowrap;">
                  <button class="btn card-favourite-btn">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <button class="btn card-view-btn">View Deals</button>
                </div>
              </div>
            </div>
            <div class="window listing-card hotel-card">
              <div class="hotel-img" style="background: url(/assets/imgs/hotel/hotel-2.svg);">
                <div class="hotel-img-counter">9 images</div>
              </div>
              <div class="listing-card-right">
                <div class="listing-right-content listing-hotel">
                  <div class="card-content" style="width: 70%;">
                    <div class="card-title">Eresin Hotels Sultanahmet - Boutique Class</div>
                    <div class="col g-12">
                      <div class="row g-2" style="flex-wrap: nowrap;">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="listing-card-priceStarting">Kucukayasofya No. 40 Sultanahmet, Istanbul 34022</div>
                      </div>
                      <div class="row g-32">
                        <div class="row g-4">
                          <div class="row g-0">
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                          </div>
                          <div class="listing-card-priceStarting" style="opacity: 1;">5 Star Hotel</div>
                        </div>
                        <div class="row g-4">
                          <i class="fa-solid fa-mug-saucer"></i>
                          <div class="listing-card-priceStarting" style="opacity: 1;"><span style="font-weight: 700;">20+</span> Amenities</div>
                        </div>
                      </div>
                      <div class="row g-8" style="height: 32px">
                        <div class="card-grade">4.2</div>
                        <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$140<span style="font-size: 14px;">/night</span></div>
                    <div class="listing-card-priceStarting" style="text-align: end;">excl. tax</div>
                  </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="filter-input-row" style="flex-wrap: nowrap;">
                  <button class="btn card-favourite-btn">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <button class="btn card-view-btn">View Deals</button>
                </div>
              </div>
            </div>
            <div class="window listing-card hotel-card">
              <div class="hotel-img" style="background: url(/assets/imgs/hotel/hotel-3.svg);">
                <div class="hotel-img-counter">9 images</div>
              </div>
              <div class="listing-card-right">
                <div class="listing-right-content listing-hotel">
                  <div class="card-content" style="width: 70%;">
                    <div class="card-title">Eresin Hotels Sultanahmet - Boutique Class</div>
                    <div class="col g-12">
                      <div class="row g-2" style="flex-wrap: nowrap;">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="listing-card-priceStarting">Kucukayasofya No. 40 Sultanahmet, Istanbul 34022</div>
                      </div>
                      <div class="row g-32">
                        <div class="row g-4">
                          <div class="row g-0">
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                          </div>
                          <div class="listing-card-priceStarting" style="opacity: 1;">5 Star Hotel</div>
                        </div>
                        <div class="row g-4">
                          <i class="fa-solid fa-mug-saucer"></i>
                          <div class="listing-card-priceStarting" style="opacity: 1;"><span style="font-weight: 700;">20+</span> Amenities</div>
                        </div>
                      </div>
                      <div class="row g-8" style="height: 32px">
                        <div class="card-grade">4.2</div>
                        <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$140<span style="font-size: 14px;">/night</span></div>
                    <div class="listing-card-priceStarting" style="text-align: end;">excl. tax</div>
                  </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="filter-input-row" style="flex-wrap: nowrap;">
                  <button class="btn card-favourite-btn">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <button class="btn card-view-btn">View Deals</button>
                </div>
              </div>
            </div>
            <div class="window listing-card hotel-card">
              <div class="hotel-img" style="background: url(/assets/imgs/hotel/hotel-4.svg);">
                <div class="hotel-img-counter">9 images</div>
              </div>
              <div class="listing-card-right">
                <div class="listing-right-content listing-hotel">
                  <div class="card-content" style="width: 70%;">
                    <div class="card-title">Eresin Hotels Sultanahmet - Boutique Class</div>
                    <div class="col g-12">
                      <div class="row g-2" style="flex-wrap: nowrap;">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="listing-card-priceStarting">Kucukayasofya No. 40 Sultanahmet, Istanbul 34022</div>
                      </div>
                      <div class="row g-32">
                        <div class="row g-4">
                          <div class="row g-0">
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                            <i class="fa-solid fa-star hotel-star"></i>
                          </div>
                          <div class="listing-card-priceStarting" style="opacity: 1;">5 Star Hotel</div>
                        </div>
                        <div class="row g-4">
                          <i class="fa-solid fa-mug-saucer"></i>
                          <div class="listing-card-priceStarting" style="opacity: 1;"><span style="font-weight: 700;">20+</span> Amenities</div>
                        </div>
                      </div>
                      <div class="row g-8" style="height: 32px">
                        <div class="card-grade">4.2</div>
                        <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$140<span style="font-size: 14px;">/night</span></div>
                    <div class="listing-card-priceStarting" style="text-align: end;">excl. tax</div>
                  </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="filter-input-row" style="flex-wrap: nowrap;">
                  <button class="btn card-favourite-btn">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <button class="btn card-view-btn">View Deals</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="btn" id="show-more-results">Show more results</button>
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
<script src="/js/stage-listing.js"></script>
<script src="/js/main.js"></script>

</html>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
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
            <div class="flight_input input_filter">
              <form class="input_filter_stroke">
                <div class="fieldsets">
                  <fieldset class="from-to">
                    <legend>From - To</legend>
                    <div class="form_content">
                      <div class="input_group">
                        <img src="/assets/icons/swap-horizontal_icon.svg" class="form_icon_left">
                        <select name="from_selector" class="selectpicker" data-dropup-auto="false"
                          data-live-search="true">
                          <option value="Lahore" selected>Lahore</option>
                          <option value="Karachi">Karachi</option>
                        </select>
                        <span class="group-separator">&mdash;</span>
                        <select name="to_selector" class="selectpicker" data-dropup-auto="false"
                          data-live-search="true">
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
                      <input name="depart_input" autocomplete="off" type="text" class="form-control flight_datepicker"
                        id="depart_datepicker" placeholder="07 Nov 22" onkeypress="return false;"
                        style="caret-color: transparent !important;" required>
                      <span class="group-separator" id="departReturn_separator">&mdash;</span>
                      <input name="return_input" autocomplete="off" type="text" class="form-control flight_datepicker"
                        id="return_datepicker" placeholder="07 Nov 22" onkeypress="return false;"
                        style="caret-color: transparent !important;" required>
                    </div>
                  </fieldset>

                  <fieldset class="passengerClass w-auto">
                    <legend>Passenger - Class</legend>
                    <div class="form_content">
                      <input name="passengers_input" type="number" class="passenger_input" placeholder="1" min="1"
                        max="10" pattern="" required>
                      <span>Pasanger, </span>
                      <select name="ticketClass_selector" class="selectpicker" data-dropup-auto="false">
                        <option value="Economy" selected>Economy</option>
                        <option value="Premium economy">Premium economy</option>
                        <option value="Business">Business</option>
                        <option value="First class">First class</option>
                      </select>
                    </div>
                  </fieldset>

                  <button class="btn show_btn search-btn" id="search-flight-btn"><img src="/assets/icons/search_icon.svg"></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container listing-row">
      <div class="listing-left-content">
        <div class="filter-title">Filters</div>
        <div class="filter">
          <div class="filter-connector">
            <div class="filter-input" id="price">
              <nav class="fold">
                  <div class="collapse-title">Price</div>
                  <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#priceScroll" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-chevron-up"></i>
                  </button>
              </nav>
              <div class="collapse show" id="priceScroll">
                  <div class="collapse-content">
                    <div class="selector">
                      <div class="data-slider">
                          <div id="slider-range" class="slider-price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                              <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                          </div>
                          <span id="min-price" data-currency="$" class="slider-data">50</span>
                          <span id="max-price" data-currency="$" data-max="1200"  class="slider-data">1200</span>
                      </div> 
                    </div>
                  </div>
              </div>
            </div>
            <hr>
            <div class="filter-input" id="time">
              <nav class="fold">
                <div class="collapse-title">Departure Time</div>
                <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#timeScroll" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-chevron-up"></i>
                </button>
              </nav>
              <div class="collapse show" id="timeScroll">
                <div class="collapse-content">
                <div class="selector">
                  <div class="data-slider">
                    <div id="slider-range" class="slider-time-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <span id="min-time" class="slider-data">12:00 AM</span>
                    <span id="max-time" class="slider-data">11:59 PM</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="filter-input" id="rating">
            <nav class="fold">
              <div class="collapse-title">Rating</div>
              <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#ratingSelect" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="filter-input" id="airlines">
              <nav class="fold">
                <div class="collapse-title">Airlines</div>
                <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#airlinesCheckbox" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-chevron-up"></i>
                </button>
              </nav>
              <div class="collapse show" id="airlinesCheckbox">
                <div class="collapse-content">
                  <div class="filter-input-col">
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Emirated">
                      <div class="checkbox-text">Emirated</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Fly Dubai">
                      <div class="checkbox-text">Fly Dubai</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Qatar">
                      <div class="checkbox-text">Qatar</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Etihad">
                      <div class="checkbox-text">Etihad</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="filter-input" id="trips">
              <nav class="fold">
                <div class="collapse-title">Trips</div>
                <button class="toggler collapsed" type="button" data-toggle="collapse" data-target="#tripsCheckbox" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-chevron-up"></i>
                </button>
              </nav>
              <div class="collapse show" id="tripsCheckbox">
                <div class="collapse-content">
                  <div class="filter-input-col">
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Round trip">
                      <div class="checkbox-text">Round trip</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="On Way">
                      <div class="checkbox-text">On Way</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="Multi-City">
                      <div class="checkbox-text">Multi-City</div>
                    </div>
                    <div class="filter-input-checkbox">
                      <input type="checkbox" name="My Dates Are Flexible">
                      <div class="checkbox-text">My Dates Are Flexible</div>
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
                <a class="anotherFilter-link nav-link active" data-toggle="tab" href="#cheapest" name="navbar_filter">
                  <div class="anotherFilter-link-title">Cheapest</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">$99</div>
                    <div class="anotherFilter-link-text">.</div>
                    <div class="anotherFilter-link-text">2h 18m</div>
                  </div>
                </a>
              </li>
              <span class="vertical_line"></span>
              <li class="nav-item">
                <a class="anotherFilter-link nav-link" data-toggle="tab" href="#best" name="navbar_filter">
                  <div class="anotherFilter-link-title">Best</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">$99</div>
                    <div class="anotherFilter-link-text">.</div>
                    <div class="anotherFilter-link-text">2h 18m</div>
                  </div>
                </a>
              </li>
              <span class="vertical_line"></span>
              <li class="nav-item">
                <a class="anotherFilter-link nav-link active" data-toggle="tab" href="#quickest" name="navbar_filter">
                  <div class="anotherFilter-link-title">Quickest</div>
                  <div class="anotherFilter-link-content">
                    <div class="anotherFilter-link-text">$99</div>
                    <div class="anotherFilter-link-text">.</div>
                    <div class="anotherFilter-link-text">2h 18m</div>
                  </div>
                </a>
              </li>
              <span class="vertical_line"></span>
              <li class="nav-item">
                <a class="anotherFilter-link nav-link active" id="other" data-toggle="tab" href="#other" name="navbar_filter">
                  <i class="fa fa-bars"></i>
                  <div class="anotherFilter-link-otherText">Other sort</div>
                </a>
              </li>
            </ul>
            <div class="horizontal_line-md" id="navbar_filter"></div>
          </div>
          <div class="row">
            <div class="showing-text">Showing 4 of <span style="color: #FF8682;">257 places</span></div>
            <div class="sort_by">Sorted by <span style="font-weight: 600;">Recommendations</span></div>
          </div>
          <div class="listing-cards">
            <div class="window listing-card">
              <div class="airlines-img emirates-md"></div>
              <div class="listing-card-right">
                <div class="row">
                  <div class="row g-8" style="height: 32px">
                    <div class="card-grade">4.2</div>
                    <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$104</div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Emirates</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
                  </div>
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Emirates</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
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
            <div class="window listing-card">
              <div class="airlines-img flydubai-md"></div>
              <div class="listing-card-right">
                <div class="row">
                  <div class="row g-8" style="height: 32px">
                    <div class="card-grade">4.2</div>
                    <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$104</div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Flydubai</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
                  </div>
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Flydubai</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
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
            <div class="window listing-card">
              <div class="airlines-img qatarAirways-md"></div>
              <div class="listing-card-right">
                <div class="row">
                  <div class="row g-8" style="height: 32px">
                    <div class="card-grade">4.2</div>
                    <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$104<span style="font-size: 14px;">/night</span></div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Qatar Airways</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
                  </div>
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Qatar Airways</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
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
            <div class="window listing-card">
              <div class="airlines-img etihadAirways-md"></div>
              <div class="listing-card-right">
                <div class="row">
                  <div class="row g-8" style="height: 32px">
                    <div class="card-grade">4.2</div>
                    <div class="listing-card-review"><span style="font-weight: 700;">Very Good</span>&#160;54 reviews</div>
                  </div>
                  <div class="card-price">
                    <div class="listing-card-priceStarting">starting from</div>
                    <div class="listing-card-price">$104<span style="font-size: 14px;">/night</span></div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Etihad Airways</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
                  </div>
                  <div class="card-content-row">
                    <div class="card-checkbox">
                      <input type="checkbox">
                      <div class="card-content-text">
                        <div class="card-time">12:00pm - 01:28pm</div>
                        <div class="card-textDescription">Etihad Airways</div>
                      </div>
                    </div>
                    <div class="showing-text" style="opacity: 0.75; line-height: 20px">non stop</div>
                    <div class="card-content-text">
                      <div class="card-time">2h 28m</div>
                      <div class="card-textDescription">EWR-BNA</div>
                    </div>
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
<script src="/js/search-filter-btn.js"></script>
</html>
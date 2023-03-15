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
  <link rel="stylesheet" href="/styles/stage-booking.css">
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

  <div class="booking-content container">
    <div class="col g-40" id="booking-left-content">
      <div class="window">
        <div class="row jc-sb w-100">
          <div class="text-title" style="width: 80%;">Superior room - 1 double bed or 2 twin beds</div>
          <div id="airplane-price">$240<span style="font-size: 14px;">/night</span></div>
        </div>
        <div class="window-body w-100">
          <div class="airline-about w-100">
            <div class="airline-logo cvk_istanbul"></div>
            <div class="col g-8">
              <div class="text-title">CVK Park Bosphorus Hotel Istanbul</div>
              <div class="row g-4" style="flex-wrap: nowrap;">
                <i class="fa-solid fa-location-dot"></i>
                <div class="icon-text">Gümüssuyu Mah. Inönü Cad. No:8, Istanbul 34437</div>
              </div>
            </div>
          </div>
          <div class="row w-100 flight-time">
            <div class="col g-8 al-center">
              <div class="window-head-text">Thursday, Dec 8</div>
              <div class="airline-airplane">Chech-In</div>
            </div>
            <div class="row g-24 al-center">
              <img src="/assets/icons/circle-arrow.svg">
              <img src="/assets/icons/black_building_icon.svg" style="width: 48px;">
              <img src="/assets/icons/circle-arrow.svg" style="transform: rotateY(180deg);">
            </div>
            <div class="col g-8 al-center">
              <div class="window-head-text">Friday, Dec 9</div>
              <div class="airline-airplane">Chech-Out</div>
            </div>
          </div>
        </div>
      </div>
      <div class="window g-16" style="padding: 16px;" id="selectPayTotal">
        <div class="payTotal" active>
          <div class="col g-8">
            <div class="payTotal-title">Pay in full</div>
            <div class="payTotal-text">Pay the total and you are all set</div>
          </div>
          <input type="radio" value="Pay in full" name="payTotalRadio" checked>
        </div>
        <div class="payTotal">
          <div class="col g-12">
            <div class="payTotal-title">Pay part now, part later</div>
            <div class="payTotal-text">Pay $207.43 now, and the rest ($207.43) will be automatically charged to the same payment method on Nov 14, 2022. No extra fees.</div>
          </div>
          <input type="radio" value="Pay part now, part later" name="payTotalRadio">
        </div>
      </div>
      <?php
      if ($_SESSION['user']) { ?>
        <div class="window g-16" id="bookPayMethod" style="padding: 16px;">
          <?php
          while ($payment_data = mysqli_fetch_assoc($payment)) { ?>
            <div class="payMethod">
              <div class="row g-32 al-center">
                <div class="logo <?= $payment_data['system'] ?>"></div>
                <div class="row g-8">
                  <div class="default-text" style="font-weight: 600; opacity: 1;">
                    **** <?= mb_substr($payment_data['card_num'], -4, 4); ?>
                  </div>
                  <div class="card-exp"><?= $payment_data['exp_date'] ?></div>
                </div>
              </div>
              <input type="radio" value="<?= $payment_data['id'] ?>" name="selectPayMethod">
            </div>
          <?php } ?>
          <div id="newPayCard" data-toggle="modal" data-target="#newPayMethod">
            <img src="/assets/icons/green_circle_icon.svg">
            <div class="icon-text">Add a new card</div>
          </div>
          <div class="modal fade" id="newPayMethod" tabindex="-1" role="dialog" aria-labelledby="newPayMethodLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="newPayCard_title">Add a new Card</div>
                  <form class="newPayCard_form">
                    <div class="newPayCard_inputs">
                      <fieldset name="cardNum" id="card-container">
                        <legend>Card Number</legend>
                        <input type="text" name="cardNum" id="card" placeholder="0000 0000 0000 0000">
                        <div id="logo"></div>
                      </fieldset>
                      <div class="secondDataCard">
                        <fieldset name="expDate">
                          <legend>Exp. Date</legend>
                          <input type="text" name="expDate" data-date placeholder="MM / YY" maxlength="5">
                        </fieldset>
                        <fieldset name="cvc">
                          <legend>CVC</legend>
                          <input type="number" name="cvc" id="cvc" max="999" placeholder="Enter the CVC code">
                        </fieldset>
                      </div>
                      <fieldset name="name">
                        <legend>Name on Card</legend>
                        <input type="text" name="name" placeholder="Enter your name on card">
                      </fieldset>
                      <fieldset name="country">
                        <legend>Country of Region</legend>
                        <select name="country" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Åland Islands">Åland Islands</option>
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="American Samoa">American Samoa</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Anguilla">Anguilla</option>
                          <option value="Antarctica">Antarctica</option>
                          <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Aruba">Aruba</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Belize">Belize</option>
                          <option value="Benin">Benin</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                          <option value="Botswana">Botswana</option>
                          <option value="Bouvet Island">Bouvet Island</option>
                          <option value="Brazil">Brazil</option>
                          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                          <option value="Brunei Darussalam">Brunei Darussalam</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Cape Verde">Cape Verde</option>
                          <option value="Cayman Islands">Cayman Islands</option>
                          <option value="Central African Republic">Central African Republic</option>
                          <option value="Chad">Chad</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Christmas Island">Christmas Island</option>
                          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                          <option value="Cook Islands">Cook Islands</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cote D'ivoire">Cote D'ivoire</option>
                          <option value="Croatia">Croatia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Dominican Republic">Dominican Republic</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Equatorial Guinea">Equatorial Guinea</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                          <option value="Faroe Islands">Faroe Islands</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="French Guiana">French Guiana</option>
                          <option value="French Polynesia">French Polynesia</option>
                          <option value="French Southern Territories">French Southern Territories</option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Gibraltar">Gibraltar</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Grenada">Grenada</option>
                          <option value="Guadeloupe">Guadeloupe</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guernsey">Guernsey</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guinea-bissau">Guinea-bissau</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haiti</option>
                          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Isle of Man">Isle of Man</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jersey">Jersey</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                          <option value="Korea, Republic of">Korea, Republic of</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Kyrgyzstan">Kyrgyzstan</option>
                          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Lesotho">Lesotho</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lithuania">Lithuania</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macao">Macao</option>
                          <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">Marshall Islands</option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mauritius">Mauritius</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                          <option value="Moldova, Republic of">Moldova, Republic of</option>
                          <option value="Monaco">Monaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montenegro">Montenegro</option>
                          <option value="Montserrat">Montserrat</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Namibia">Namibia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherlands">Netherlands</option>
                          <option value="Netherlands Antilles">Netherlands Antilles</option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau">Palau</option>
                          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                          <option value="Panama">Panama</option>
                          <option value="Papua New Guinea">Papua New Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Philippines">Philippines</option>
                          <option value="Pitcairn">Pitcairn</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Reunion">Reunion</option>
                          <option value="Romania">Romania</option>
                          <option value="Russian Federation">Russian Federation</option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="Saint Helena">Saint Helena</option>
                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                          <option value="Saint Lucia">Saint Lucia</option>
                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                          <option value="Samoa">Samoa</option>
                          <option value="San Marino">San Marino</option>
                          <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Serbia">Serbia</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leone">Sierra Leone</option>
                          <option value="Singapore">Singapore</option>
                          <option value="Slovakia">Slovakia</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="Solomon Islands">Solomon Islands</option>
                          <option value="Somalia">Somalia</option>
                          <option value="South Africa">South Africa</option>
                          <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                          <option value="Spain">Spain</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                          <option value="Taiwan">Taiwan</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Timor-leste">Timor-leste</option>
                          <option value="Togo">Togo</option>
                          <option value="Tokelau">Tokelau</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Turkmenistan">Turkmenistan</option>
                          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Emirates">United Arab Emirates</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States">United States</option>
                          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                          <option value="Uruguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Viet Nam">Viet Nam</option>
                          <option value="Virgin Islands, British">Virgin Islands, British</option>
                          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                          <option value="Wallis and Futuna">Wallis and Futuna</option>
                          <option value="Western Sahara">Western Sahara</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                      </fieldset>
                      <div class="remenderCard">
                        <input type="checkbox" name="remember-card" id="">
                        <div class="rememberCard-text">Securely save my information for 1-click checkout</div>
                      </div>
                      <p class="msg warning_msg none"></p>
                    </div>
                    <div class="newPayCard_submit">
                      <button type="submit" id="newPayCard_submit" class="btn show_btn">Add Card</button>
                      <div class="newPayCard_submitAbout">
                        By confirming your subscription, you allow The Outdoor Inn Crowd Limited to charge your card for this payment and future payments in accordance with their terms. You can always cancel your subscription.
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="window" id="bookPayMethod" style="padding: 24px;">
          <div class="col g-16 w-100">
            <div class="window-head-text">Login or Sign up to book</div>
            <a href="/pages/login.php">
              <button class="btn show_btn">Login</button>
            </a>
            <a href="/pages/sign_up.php">
              <button class="btn show_btn">Sign Up</button>
            </a>
          </div>
          <div class="row jc-sb al-center w-100" id="loginSignup-separator" style="flex-wrap: nowrap;">
            <hr>
            <div class="default-text" style="opacity: 1;">Or</div>
            <hr>
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
      <?php } ?>
    </div>
    <div class="col g-16" id="booking-right-content">
      <div class="window col g-16" style="padding: 24px;">
        <div class="row g-24 w-100" style="flex-wrap: nowrap;">
          <div id="airplane-img" style="background: url(/assets/imgs/hotel-detail/1.svg) no-repeat;"></div>
          <div class="col g-20">
            <div class="col g-4">
              <div class="default-text">CVK Park Bosphorus...</div>
              <div class="window-head-text">Superior room - 1 double bed or 2 twin beds</div>
            </div>
            <div class="row g-8">
              <div class="card-grade">4.2</div>
              <div class="review-text"><span style="font-weight: 700;">Very Good</span>&#160;371 reviews</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="default-text w-100" style="opacity: 1;">Your booking is protected by <span style="font-weight: 600;">golobe</span></div>
        <hr>
        <div class="col g-16 w-100">
          <div class="default-text" style="opacity: 1;">Price Details</div>
          <div class="row jc-sb">
            <div class="default-text" style="opacity: 1;">Base Fare</div>
            <div class="default-text" style="opacity: 1;">$240</div>
          </div>
          <div class="row jc-sb">
            <div class="default-text" style="opacity: 1;">Discount</div>
            <div class="default-text" style="opacity: 1;">$0</div>
          </div>
          <div class="row jc-sb">
            <div class="default-text" style="opacity: 1;">Taxes</div>
            <div class="default-text" style="opacity: 1;">$20</div>
          </div>
          <div class="row jc-sb">
            <div class="default-text" style="opacity: 1;">Service Fee</div>
            <div class="default-text" style="opacity: 1;">$5</div>
          </div>
        </div>
        <hr>
        <div class="row jc-sb w-100">
          <div class="default-text" style="opacity: 1;">Total</div>
          <div class="default-text" style="opacity: 1;">$265</div>
        </div>
      </div>
      <?php
      if ($_SESSION['user'] && mysqli_num_rows($payment) > 0) { ?>
        <button class="btn show_btn" id="payFlightTicket">Pay</button>
        <p class="msg warning_msg none"></p>
      <?php } ?>
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
<script src="/js/accountManage.js"></script>
<script src="/js/card-validator.js"></script>

</html>
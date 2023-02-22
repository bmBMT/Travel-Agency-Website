jQuery(document).ready(function() {
    let header = document.getElementById("header");
    let indexHero = document.getElementById("indexHero");
    let body = document.getElementById("body");
    let hero = document.getElementById("hero");
    let airPlane_icon = document.getElementById("head_airPlane_icon");
    let bed_icon = document.getElementById("head_bed_icon");
    let logo_icon = document.getElementById("logo_icon");
    let login_btn = document.getElementById("login_btn");
    let sign_up_btn = document.getElementById("sign_up_btn");
    let favourites_icon = document.getElementById("heart_icon");

    const sm_mq = window.matchMedia('(max-width: 670px)');
    const lg_mq = window.matchMedia('(min-width: 671px)');

    sm_mq.addListener(WidthChange);
    WidthChange(sm_mq);
    function WidthChange(sm_mq) {
        if(sm_mq.matches){
            body.insertBefore(header, indexHero);
            indexHero_content.style.margin = "0px";
            indexHero_content.style.marginTop = "95px"
            changeHead();
        } else {
            indexHero_content.insertBefore(header, hero);
            indexHero_content.style.marginTop = "30px";
        }
    }

    if (lg_mq.matches) {
        if ($(window).scrollTop() > 50) {
            changeHead();
        } else {
            returnHead();
        }
    }

    $(window).scroll(function() {
        if (lg_mq.matches) {
            if ($(window).scrollTop() > 50) {
                changeHead();
            } else {
                returnHead();
            }
        }
    });

    function changeHead() {
        header.style.background = "#fafbfc"
        header.style.color = "#112211"
        airPlane_icon.src = "assets/icons/black_airplane_icon.svg";
        bed_icon.src = "assets/icons/black_bed_icon.svg";
        logo_icon.src = "assets/icons/blackGreen_logo_icon.svg";
        if (login_btn) {
            login_btn.style.color = "#112211";
            sign_up_btn.classList.remove("btn_white");
            sign_up_btn.classList.add("btn_black");
        }
        if (favourites_icon) {
            favourites_icon.src = "assets/icons/black_heart_icon.svg";
        }
    }
    
    function returnHead() {
        header.style.background = null;
        header.style.color = "#ffffff"
        airPlane_icon.src = "assets/icons/white_airplane_icon.svg";
        bed_icon.src = "assets/icons/white_bed_icon.svg";
        logo_icon.src = "assets/icons/whiteGreen_logo_icon.svg";
        if (login_btn) {
            login_btn.style.color = "#ffffff";
            sign_up_btn.classList.remove("btn_black");
            sign_up_btn.classList.add("btn_white");
        }
        if (favourites_icon) {
            favourites_icon.src = "assets/icons/white_heart_icon.svg";
        }
    }
});

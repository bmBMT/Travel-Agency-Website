jQuery(document).ready(function() {
    let header = document.getElementById("header");
    let body = document.getElementById("body");
    let indexHero = document.getElementById("indexHero");
    let indexHero_content = document.getElementById("indexHero_content");
    let hero = document.getElementById("hero");
    const mq = window.matchMedia('(max-width: 670px)');


    mq.addListener(WidthChange);
    WidthChange(mq);
    function WidthChange(mq) {
        if(mq.matches){
            indexHero.insertBefore(header, indexHero_content);
            indexHero_content.style.margin = "0px";
        } else {
            indexHero_content.insertBefore(header, hero);
            indexHero_content.style.marginTop = "30px";
        }
    }

    $(window).scroll(function() {     
        if ($(window).scrollTop() > 50) {
            // TODO
        } else {
            // TODO
        }
    });
});
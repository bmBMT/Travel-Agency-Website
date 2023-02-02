document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#airplane_stage").addEventListener("click", function() {
        const screenWidth = window.screen.width;

        const underLine = document.querySelector("#sections_line");
        const flightContent = document.querySelector(".flight_input");
        const bedContent = document.querySelector(".bed_input");

        bedContent.style.display = "none";
        flightContent.style.display = "flex";

        underLine.style.transform = "translateX(0px)";
    });

    document.querySelector("#bed_stage").addEventListener("click", function() {
        const screenWidth = window.screen.width;

        const underLine = document.querySelector("#sections_line");
        const flightContent = document.querySelector(".flight_input");
        const bedContent = document.querySelector(".bed_input");

        flightContent.style.display = "none";
        bedContent.style.display = "flex";

        underLine.style.transform = "translateX(172px)";
    });
});
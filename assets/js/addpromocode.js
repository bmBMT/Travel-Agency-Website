document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("addPromoCode_btn").addEventListener("click", function() {
        var input = document.createElement("input");
        input.type = "text";
        input.classList.add("addPromoCode_input");
        input.name = "flight_addPromoCode";
        input.placeholder = "Enter your Promo Code";
        this.parentNode.appendChild(input);
        this.remove();
    });
    document.querySelector(".addPromoCode_btn").addEventListener("click", function() {
        var input = document.createElement("input");
        input.type = "text";
        input.classList.add("addPromoCode_input");
        input.name = "bed_addPromoCode";
        input.placeholder = "Enter your Promo Code";
        this.parentNode.appendChild(input);
        this.remove();
    });
});
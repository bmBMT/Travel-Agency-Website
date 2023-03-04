document.addEventListener("DOMContentLoaded", function() {
    
    // findFlight stage
    if (document.querySelector("#airplane_stage")) {
        document.querySelector("#airplane_stage").addEventListener("click", function() {
            const underLine = document.querySelector("#sections_line");
            const flightContent = document.querySelector(".flight_input");
            const bedContent = document.querySelector(".bed_input");
    
            bedContent.style.display = "none";
            flightContent.style.display = "flex";
    
            underLine.style.transform = "translateX(0px)";
        });
    }

    // findStays stage
    if (document.querySelector("#bed_stage")) {
        document.querySelector("#bed_stage").addEventListener("click", function() {
            const underLine = document.querySelector("#sections_line");
            const flightContent = document.querySelector(".flight_input");
            const bedContent = document.querySelector(".bed_input");
    
            flightContent.style.display = "none";
            bedContent.style.display = "flex";
    
            underLine.style.transform = "translateX(178px)";
        });
    }

    // addPromoCode on findStays stage
    if (document.getElementById("addPromoCode_btn")) {
        document.getElementById("addPromoCode_btn").addEventListener("click", function() {
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("addPromoCode_input");
            input.name = "flight_addPromoCode";
            input.placeholder = "Enter your Promo Code";
            this.parentNode.appendChild(input);
            this.remove();
        });
    }

    // addPromoCode on findFlight stage
    if (document.querySelector(".addPromoCode_btn")) {
        document.querySelector(".addPromoCode_btn").addEventListener("click", function() {
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("addPromoCode_input");
            input.name = "bed_addPromoCode";
            input.placeholder = "Enter your Promo Code";
            this.parentNode.appendChild(input);
            this.remove();
        });
    }

    // datePicker changer from trip form value
    if (document.querySelector(".trip_select")) {
        document.querySelector(".trip_select").addEventListener("change", function() {
            const legend = document.getElementById("departReturn_legend");
            const separator = document.getElementById("departReturn_separator");
            const dataPicker  = document.getElementById("return_datepicker");
    
            switch (this.value) {
                case "Return":
                    legend.innerHTML = "Depart - Return";
                    separator.style.display = "block";
                    dataPicker.style.display = "block";
                    break
    
                case "Single":
                    legend.innerHTML = "Depart";
                    separator.style.display = "none";
                    dataPicker.style.display = "none";
                    break
            }
        });
    }
    if (document.querySelector("#bed_input-city")) {
        document.querySelector("#bed_input-city").addEventListener("change", function() {
            const selectedValue = this.options[this.selectedIndex].value;
            this.options[this.selectedIndex].text = selectedValue;
        });
    }    
});

// flight_dataPicker
$( function() {
    $(".flight_datepicker").datepicker({ dateFormat: "dd M y" });
} );

// bed_dataPicker
$( function() {
    $(".bed_datepicker").datepicker({ dateFormat: "D mm/d" });
} );

let payTotalRadios = document.querySelectorAll('input[name="payTotalRadio"]');

payTotalRadios.forEach(payTotalRadio => {
    payTotalRadio.addEventListener('change', () => {
        if (payTotalRadio.checked) {
            let payTotals = document.querySelectorAll('.payTotal');
            payTotals.forEach(payTotal => {
                payTotal.removeAttribute('active');
            });
            payTotalRadio.parentNode.setAttribute('active', '');
        }
    });
});

let paymentMethods = document.querySelectorAll('input[name="selectPayMethod"]');
if (paymentMethods.length != 0) {
    paymentMethods[0].checked = true;
    paymentMethods[0].parentNode.setAttribute('active', '');
}
paymentMethods.forEach(paymentMethod => {
    paymentMethod.addEventListener('change', () => {
        if (paymentMethod.checked) {
            let payMethods = document.querySelectorAll('.payMethod');
            payMethods.forEach(payMethod => {
                payMethod.removeAttribute('active');
            });
            paymentMethod.parentNode.setAttribute('active', '');
        }
    });
});

$('#payFlightTicket').click(function () {
    $(".warning_msg").addClass('none').text('');
    let payTotal = $('input[name="payTotalRadio"]:checked').val(),
        paymentID = $('input[name="selectPayMethod"]:checked').val();

    $.ajax({
        url: '/vendor/bookTicket.php',
        type: 'POST',
        dataType: 'json',
        data: {
            payTotal: payTotal,
            paymentID: paymentID
        },
        success(data) {
            if (data.status) {

            } else {
                $(".warning_msg").removeClass('none').text('Error');
            }
        }
    });
});
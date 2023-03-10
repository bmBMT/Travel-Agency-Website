$('.toggler').click(function() {
    const CLASS = $(this).attr('class');
    const TARGET = $(this).attr('data-target');
    let chevron = $(`button[data-target="${TARGET}"] i`);
    if (chevron.attr('style') === 'transform: rotateX(180deg);') {
        chevron.css('transform', 'rotateX(0deg)');
    } else {
        chevron.css('transform', 'rotateX(180deg)');
    }
});

$(".slider-price-range").slider({
    range: true,
    min: 50,
    max: 1200,
    step: 10,
    values: [50, 1200],
    slide: function( event, ui ) {
      $("#min-price").html(ui.values[ 0 ]);
      $("#max-price").html(ui.values[ 1 ]);         
    }
})

$(".slider-time-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [0, 1440],
    slide: function( event, ui ) {
      $("#min-time").html(get12HourTime(ui.values[0]));
      $("#max-time").html(get12HourTime(ui.values[1]));         
    }
});
  
function get12HourTime(minutes){
    var meridian = "AM";
    if (minutes >= 720) {
    meridian = "PM";
    }
    var hh = Math.floor(((minutes + 719) / 60) % 12) + 1;
    var mm = Math.floor((minutes % 60 / 10)) * 10;
    return (hh < 10 ? '0' : '') + hh + ':' + (mm === 0 ? '00' : mm) + ' ' + meridian;
}
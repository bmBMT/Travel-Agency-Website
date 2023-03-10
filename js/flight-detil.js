$(document).ready(function(){
    $("input[data-single-check]").change(function(){
        if($(this).is(':checked')){
            var text = $(this).attr("value");
            $("#ticketClass").html("Basic " + text + " Features");
        }
    });
});
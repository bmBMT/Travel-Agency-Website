$('.nav-link').click(function() {
    const ID = $(this).attr('name');
    var underline = $(`.horizontal_line-md[id="${ID}"]`);
    let _this = $(this);
    let leftScale = _this.position().left;
    underline.css({left: '' + leftScale + 'px'});
    if (leftScale == underline.position().left + 7) {
        let topScale = _this.position().top;
        let heightScale = _this.height();
        let top = parseInt(topScale) + parseInt(heightScale) + 9;
        underline.css({top: '' + top + 'px'});
    }
});
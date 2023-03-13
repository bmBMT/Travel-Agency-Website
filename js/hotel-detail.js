const isElementWrapped = (element, container) => (element.getBoundingClientRect().top > container.getBoundingClientRect().top);
const room_books = document.querySelectorAll('.room-book');
room_books.forEach((room_book) =>
    checkElementWrap(room_book, room_book.parentElement)
);
checkSmallWidth(this.window.innerWidth);
window.addEventListener('resize', function () {
    room_books.forEach((room_book) =>
        checkElementWrap(room_book, room_book.parentElement)
    );
    checkSmallWidth(this.window.innerWidth);
});
function checkElementWrap(element, container) {
    element.classList.remove('wrapped');
    if (isElementWrapped(element, container)) {
        element.classList.add('wrapped');
    }
}

function checkSmallWidth(width) {
    let photos = document.querySelectorAll('#hotel-imgs > div[data-toggle]');
    photos.forEach((photo) => {
        if (width <= 500) {
            photo.dataset.toggle = 'modal';
        } else {
            photo.dataset.toggle = '';
        }
    });
}

function getRatingText(rating) {
    if (rating < 2) text = 'Very bad';
    else if (rating < 3) text = 'Bad';
    else if (rating < 3.5) text = 'Not bad';
    else if (rating < 4) text = 'Good';
    else if (rating < 4.5) text = 'Very good';
    else text = 'Amazing';
    return text;
}

const stars = document.querySelectorAll('#starRating i');
let lastIndex = -1;
stars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
        for (let i = 0; i <= index; i++) {
            stars[i].classList.replace('far', 'fas');
            stars[i].style.opacity = '0.5';
        }
        for (let i = index + 1; i < stars.length; i++) {
            stars[i].classList.replace('fas', 'far');
            stars[i].style.opacity = '0.5';
        }
    });

    star.addEventListener('click', () => {
        let rating = document.querySelector('#starRating input');
        let ratingText = document.querySelector('#starRating .review-rating');
        for (let i = 0; i <= index; i++) {
            stars[i].classList.replace('far', 'fas');
            stars[i].style.opacity = '1';
        }
        lastIndex = index;
        rating.value = lastIndex + 1;
        ratingText.textContent = getRatingText(rating.value);
    });

    star.addEventListener('mouseout', () => {
        if (lastIndex === -1) {
            stars.forEach(star => star.classList.replace('fas', 'far'));
        } else {
            for (let i = 0; i <= lastIndex; i++) {
                stars[i].classList.replace('far', 'fas');
                stars[i].style.opacity = '1';
            }
            for (let i = lastIndex + 1; i < stars.length; i++) {
                stars[i].classList.replace('fas', 'far');
                stars[i].style.opacity = '0.5';
            }
        }
    });
});

$('#postReview').click(function () {
    $(".warning_msg").addClass('none').text('');
    let rating = $('#starRating input').val(),
        ratingText = $('#starRating .review-rating').text(),
        reviewText = $('#reviewModal textarea').val();
    
    $.ajax({
        url: '/vendor/postReview.php',
        type: 'POST',
        dataType: 'json',
        data: {
            rating: rating,
            ratingText: ratingText,
            reviewText: reviewText
        },
        success (data) {
            if (data.status) {

            } else {
                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });
});
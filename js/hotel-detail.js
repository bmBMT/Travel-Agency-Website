const isElementWrapped = (element, container) => (element.getBoundingClientRect().top > container.getBoundingClientRect().top);
const room_books = document.querySelectorAll('.room-book');
room_books.forEach((room_book) =>
    checkElementWrap(room_book, room_book.parentElement)
);
window.addEventListener('resize', function () {
    room_books.forEach((room_book) =>
        checkElementWrap(room_book, room_book.parentElement)
    );
});
function checkElementWrap(element, container) {
    element.classList.remove('wrapped');
    if (isElementWrapped(element, container)) {
        element.classList.add('wrapped');
    }
}
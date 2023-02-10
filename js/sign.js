function hidePassword(i) {
    let input = document.querySelector(`#loginPassword${i}`);
    let hide = document.querySelector(`#hide${i}`);
    let view = document.querySelector(`#view${i}`);

    if (input.type === "password") {
        input.type = 'text';
        hide.style.display = "none";
        view.style.display = null;
    } else {
        input.type = 'password';
        hide.style.display = null;
        view.style.display = "none";
    }
}
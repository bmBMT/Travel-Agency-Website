function logined(e) {
    let unloginedElements = document.querySelector("#unlogined_btns");
    let loginedElements = document.querySelector("#logined_elements");
    let roleColor = document.querySelector("#arrowDown");

    if (e) {
        unloginedElements.remove();

        role = e['role']

        if (role == "admin") {
            roleColor.style.background = "#ff8682";
        } else if (role == "moderator") {
            roleColor.style.background = "#8DD3BB";
        } else if (role == "user") {
            roleColor.style.background = "#FFFFFF";
        }
    } else {
        loginedElements.remove();
    }
}
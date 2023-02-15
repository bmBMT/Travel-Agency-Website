function logined(e) {
    let unloginedElements = document.querySelector("#unlogined_btns");
    let loginedElements = document.querySelector("#logined_elements");
    let roleColor = document.getElementsByClassName("arrowDown");
    let accountAvatar = document.querySelector("#big_avatar");

    if (e) {
        unloginedElements.remove();

        role = e['role'];

        if (role == "admin") {
            color = "#ff8682";
        } else if (role == "moderator") {
            color = "#8DD3BB";
        } else if (role == "user") {
            color = "#FFFFFF";
        }

        if (accountAvatar) {
            accountAvatar.style.border = `4px solid ${color}`;
        }

        for (i=0; i < roleColor.length; i++) {
            roleColor[i].style.background = color;
        }
    } else {
        loginedElements.remove();
    }
}
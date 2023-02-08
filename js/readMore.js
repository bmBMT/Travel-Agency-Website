function readMore(i) {
    var dots = document.getElementsByClassName("dots")[i];
    var moreText = document.getElementsByClassName("more")[i];
    var btnText = document.getElementsByClassName("readBtn")[i];
    
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "View more";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Hide";
      moreText.style.display = "inline";
    }
  }
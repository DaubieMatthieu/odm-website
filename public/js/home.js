upBtn = document.getElementById("link-top");

window.addEventListener('scroll', scroll_up_arrow);

function scroll_up_arrow() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    upBtn.style.display = "block";
  } else {
    upBtn.style.display = "none";
  }
}

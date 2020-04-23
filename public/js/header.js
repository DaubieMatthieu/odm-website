var header = document.getElementById("header");

window.addEventListener('scroll', scroll_header);

function scroll_header() {
  if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
    header.style.backgroundColor = "white";
    header.style.boxShadow = "0px 5px 5px 0px rgb(184, 184, 184)";
  } else {
    header.style.backgroundColor = "transparent";
    header.style.boxShadow = "none";
  }
}

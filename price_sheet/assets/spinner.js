// (A) SHOW & HIDE SPINNER
function show () {
  document.getElementById("spinner").classList.add("show");
}
function hide () {
  document.getElementById("spinner").classList.remove("show");
}

// (B) AJAX DEMO - USE HTTP:// NOT FILE://
function demoAJAX () {
  show(); // BLOCK PAGE WHILE LOADING
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "page.html");
  xhr.onload = function(){
    document.getElementById("container").innerHTML = this.response;
    hide(); // UNBLOCK PAGE
  };
  xhr.send();
}

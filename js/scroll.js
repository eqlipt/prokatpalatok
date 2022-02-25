var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById('wrapper-nav').style.top = '0';
  } else {
	  document.getElementById('wrapper-nav').style.top = '-50px';
  }
  prevScrollpos = currentScrollPos;
}
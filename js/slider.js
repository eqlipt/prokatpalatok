// Rotate images in the top banner section
const NumberOfImagesToRotate = 45;
FirstPart = ' url("img/title/title';
LastPart = '.webp")';
var r = Math.ceil(Math.random() * NumberOfImagesToRotate);
var image = FirstPart + r + LastPart;
document.getElementById("slider").style.background =
  "linear-gradient(rgba(40,40,40,0.65),rgba(200,200,200,0.35))," +
  image +
  " center/cover no-repeat";

// Put inventroy images inside placeholder anchor tags
const imagePlaceholderArray = document.querySelectorAll(".spinner");
imagePlaceholderArray.forEach((item, id) => {
  const imageToAppend = document.createElement("img");
  imageToAppend.src = item.href;
  imageToAppend.alt = item.dataset.alt;
  imageToAppend.classList.add("box");
  imageToAppend.classList.add("fadeout");
  imageToAppend.setAttribute("itemprop", "image");
  imageToAppend.addEventListener("load", function () {
    imagePlaceholderArray[id].appendChild(imageToAppend);
    setTimeout(function () {
      imageToAppend.classList.add("fadein");
      item.classList.remove("spinner");
    }, 150);
  });
});

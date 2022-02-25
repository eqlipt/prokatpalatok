var checkbox = document.getElementById("basket-checkbox");
var basket = document.getElementById("basket");
var duration = document.getElementById("duration");
checkbox.addEventListener('click', () => {			
    if(checkbox.checked) {
        basket.classList.add("minimized");
        duration.style.display = "none";
    } else {
        basket.classList.remove("minimized");
        duration.style.display = "block";
    }
});
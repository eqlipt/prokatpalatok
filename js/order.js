//фунуционал кнопок управления количеством в заказе
//создаём массив, в котором будут храниться поля количества для всех выведенных на страницу единиц снаряжения и срока проката
let quantityInput = [];
// и отдельную константу для поля срока проката
const durationInput = document.getElementById('duration');

//создаём списки всех кнопок "минус" и "плюс"
const minusButtons = document.querySelectorAll("[id^=minus-button-]");
const plusButtons = document.querySelectorAll("[id^=plus-button-]");

//Проходим по списку кнопок и для каждой кнопки "минус" (можно и плюс, их количество одинаковое)
for(let i = 0; i < minusButtons.length; i++) {

    //в массив quantity добавляем id соответствующей полю кнопки "минус" (можно и плюс, значение id одинаковое у обеих кнопок), обрезая из id кнопки фрагмент 'minus-button-'
    quantityInput[i] = document.getElementById(minusButtons[i]['id'].substring('minus-button-'.length));

    //и каждой кнопке "минус" назначаем функцию: по щелчку,
    minusButtons[i].addEventListener('click', () => {

        //ограничивая минимальное значение поля единицей,
        if(Number(quantityInput[i].value) > 1) {

            //уменьшать значение поля количества на единицу.
            quantityInput[i].value = Number(quantityInput[i].value) - 1;
        }
    });

    //То же для кнопок "плюс", но без ограничения значения
    plusButtons[i].addEventListener('click', () => {
        quantityInput[i].value = Number(quantityInput[i].value) + 1;
    });
}

// функционал выбора дат и отображения количества дней проката
// собираем данные о сроках проката
let startDate, endDate, duration;
// если открыта корзина
if(document.getElementById('dates')) {
    // подхватываем значение поля dates (приходит из базы)
    let dates = document.getElementById('dates');
    initDates(dates);
}
// инициализируем календарь и отмечаем на нём существующие даты
var myDatepicker = $('#dates').datepicker().data('datepicker');
if(startDate) {myDatepicker.selectDate(startDate);}
if(endDate) {myDatepicker.selectDate(endDate);}

// назначаем в переменные startDate и endDate данные из поля dates
function initDates(dates) {
    // проверяем, что не передаются пустые поля, если даты не заданы в базе
    if(dates.value.slice(0, 10) && dates.value.slice(0, 10) != '0000-00-00') {startDate = new Date(dates.value.slice(0, 10));}
    if(dates.value.slice(13, 23) && dates.value.slice(13, 23) != '0000-00-00') {endDate = new Date(dates.value.slice(13, 23));}
}
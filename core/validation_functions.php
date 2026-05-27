<?php

function is_blank($value) {
    return !isset($value) || trim($value) === '';
}


// преобразовываем любые значения в числовые
function validate_numeric($variable, $default) {

	//если в переменной не число или ноль
	if(!is_numeric($variable) || $variable == 0) {
		//присваеваем значение по умолчанию
		$result = $default;

	//если число
	} else {
		//присваиваем модуль переданного значения
		$result = abs($variable);
	}
	return $result;
}

?>
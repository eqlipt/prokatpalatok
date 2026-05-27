<?php

function update_order_data($data) {
		$order = [];
		// подхватываем номер заказа из формы
		$order['id'] = $data['order_id'];

    // выделяем данные о датах и продолжительности проката
    $order['start_date'] = substr($data['dates'], 0, -13);
    $order['end_date'] = substr($data['dates'], 13);
    // если не заданы даты проката в календаре
    if($order['start_date'] == NULL || $order['start_date'] == NULL) {
        // выделяем срок заказа $duration из поля длительности проката
        // проверяем, что в полученной из формы переменной число (2 по умолчанию)
        $order['duration'] = validate_numeric($data['duration'], 2);
    } else {
        // если заданы даты, то вычисляем продолжительнсть на их основе
        $order['duration'] = calculate_duration($order['start_date'], $order['end_date'], 2);
    }

    // выделяем данные о скидке
		$order['discount_input'] = sanitize_discount_input($data['discount_input']);

    // выделяем данные о заказчике и о предопалте
    $order['customer_returning'] = isset($data['customer_returning']) ? '1' : '0';
    $order['customer_name'] = $data['customer_name'];
    $order['customer_tel'] = $data['customer_tel'];
    $order['customer_address'] = $data['customer_address'];
    $order['comment'] = $data['comment'];
    $order['upfront'] = $data['upfront'];

    // оставляем в массиве только товары
    $data = purge_excessive_post_data($data);

    // подсчёт промежуточной стоимости проката
    $order['full_price'] = calculate_full_price($data, $order['duration']);

		// подсчёт скидки
		$order['discount_value'] = calculate_discount($order['full_price'], $order['discount_input']);

		// подсчёт цены заказа со скидкой
		$order['price'] = $order['full_price'] - $order['discount_value'];

    // подсчёт общей стоимости залога
    $order['deposit'] = calculate_total_deposit($data);

    // готовим массив с товарами для записи в базу
    $order['inventory'] = prepare_inventory_for_basket($data);
	return $order;
}

function purge_excessive_post_data($data) {
	unset($data['order_id']);
	unset($data['discount_input']);
	unset($data['duration']);
	unset($data['customer_returning']);
	unset($data['customer_name']);
	unset($data['customer_tel']);
	unset($data['customer_address']);
	unset($data['comment']);
	if(isset($data['upfront'])) {
		unset($data['upfront']);
	}
    unset($data['dates']);
	if(isset($data['recount'])) {
		unset($data['recount']);
	}
	if(isset($data['receipt'])) {
		unset($data['receipt']);
	}
	if(isset($data['remove'])) {
		// удаляем из массива товар
		unset($data[$data['remove']]);
		// удаляем метку
		unset($data['remove']);
	}
	return $data;
}

function not_empty($basket) {
	//проверяем, что это не сериализованный массив с нулевым содержанием или не пустой массив
	return ($basket != 'a:0:{}' && !empty($basket));
}

function in_basket($inventory_id, $basket) {
	//проверяем, есть ли заданный id в передаваемом массиве 
	return array_key_exists($inventory_id, $basket);
}

function prepare_inventory_for_basket($inventory) {
	//создаём копию полученного массива, в которую будем подставлять значения на основе валидации
	$inventory_for_basket = $inventory;
	//проходим по массиву с товарами
    foreach($inventory as $key => $value) {
		//и в подготавливаемом массиве присваиваем несоответствующим ключам значение по умолчанию (1)
        $inventory_for_basket[$key] = validate_numeric($value, 1);
    }
	//сортируем инвентарь по возрастанию id
	ksort($inventory_for_basket);
	//сериализуем для записи массива в базу в виде строки
	return serialize($inventory_for_basket);
}

function update_basket($order) {
    // если сессия
    if(isset($_SESSION['order'])) {
        $_SESSION['order'] = $order;

    // если база
    } else {
        update_order($order);
    }
}

// подсчёт количества дней между датами
function calculate_duration($start_date, $end_date, $default = 2) {
	$start = date_create($start_date);
	$end = date_create($end_date);
	$diff = date_diff($start, $end);
	$result = $diff->format("%a");
	if($result == 0) {
		return $default;
	} else {
		return $result;
	}
}

// подсчёт стоимости проката $price за единицу товара в зависимости от срока проката
function calculate_price($inventory_id, $duration = '2') {

	$inventory_item = find_inventory_by_id($inventory_id);

	//для срока не менее двух суток
	if($duration >= 2) {
		//вторые сутки
		$day2 = 1;
		//количество суток сверх вторых
		$leftover = $duration - 2;

	//для срока менее двух суток
	} else {
		$day2 = 0;
		$leftover = 0;
	}

	return $price = (
		$inventory_item['price1'] + 
		$inventory_item['price2'] * $day2 + 
		$inventory_item['price3'] * $leftover
	);
}

// подсчёт стоимости заказа $full_price
function calculate_full_price($inventory_items, $duration) {

    // переменная для подсчёта общей стоимости заказа
	$full_price = 0;

	// разбиваем массив на id товара и его количество
	foreach($inventory_items as $inventory_id => $quantity) {

		// в зависимости от срока проката подсчитываем полную стоимость за единицу товара
		$individual_price = calculate_price($inventory_id, $duration);

		// добавляем его стоимость, помноженную на количвество в корзине, в переменную общей стоимости
		$full_price += $quantity * $individual_price;
	}
	return $full_price;
}

function calculate_discount($full_price, $discount_input) {
    // Initialize the discount amount to zero
    $discount_amount = 0;
    // Check if the discount input is a numeric value
    if (is_numeric($discount_input)) {
        $discount_amount = floatval($discount_input);
    } else {
    // Check if the discount input ends with a percent sign
				$discount_amount = check_discount_percentage_get($full_price, $discount_input, $discount_amount);
		}

    // If the input is neither a numeric value nor a valid percentage, the discount remains zero
    return $discount_amount;
}

function check_discount_percentage_get($full_price, $discount_input, $discount_amount = 0) {
	if (is_string($discount_input) && strpos($discount_input, '%') !== false) {
		// Remove the percent sign and convert to a float
		$percent_value = rtrim($discount_input, '%');
		if (is_numeric($percent_value)) {
				$discount_percentage = floatval($percent_value) / 100;
				$discount_amount = $full_price * $discount_percentage;
		}
	}
	return $discount_amount;
}

// подсчёт стоимости залога $deposit за всё количество товара данного вида
function calculate_deposit($inventory_id, $quantity) {

		// выбираем в $individual_deposit из базы стоимость залога за данный товар
		$inventory_item = find_inventory_by_id($inventory_id);
		$individual_deposit = $inventory_item['deposit'];

		// учитываем количество
		$deposit = $individual_deposit * $quantity;
		
		return $deposit;
}

// подсчёт стоимости залога $total_deposit
function calculate_total_deposit($inventory_items) {

    // переменная для подсчёта общей стоимости залога
	$total_deposit = 0;

	// разбиваем массив на id товара и его количество
	foreach($inventory_items as $inventory_id => $quantity) {

		// выбираем в $individual_deposit из базы стоимость залога за данный товар
		$inventory_item = find_inventory_by_id($inventory_id);
		$individual_deposit = $inventory_item['deposit'];

		// добавляем его стоимость, помноженную на количвество в корзине, в переменную общей стоимости
		$total_deposit += $quantity * $individual_deposit;
	}
	return $total_deposit > TOTAL_DEPOSIT_THRESHOLD ? TOTAL_DEPOSIT_THRESHOLD : $total_deposit;
}

function sanitize_discount_input($input) {
	// Trim the input to remove any whitespace
	$input = trim($input);
	
	// Check if the input ends with a percent sign and is a valid percentage
	if (preg_match('/^0*(\d+)(\.\d+)?%$/', $input, $matches)) {
		return ltrim($matches[0], '0'); // Return the percentage without leading zeros
	}
	
	// Check if the input is a valid numeric value
	if (is_numeric($input)) {
			return ltrim($input, '0'); // Return the numeric value without leading zeros
	}
	
	// If it doesn't match either criteria, return null or handle the error
	return 0; // or throw an exception, or return a default value
}

?>
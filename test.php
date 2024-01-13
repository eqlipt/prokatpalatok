<?php
$group_id = 53310491;
$topic_id = 28269369;
$access_token = '4ccdc4554ccdc4554ccdc455114fdb524044ccd4ccdc45529b8fe24fa828441d1937d8f';

function get_comments_count() {
	global $group_id;
	global $access_token;
	$request_params = array(
			'group_id' => $group_id,
			'v' => '5.199',
			'access_token' => $access_token
	);
	$get_params = http_build_query($request_params);
	$result = json_decode(file_get_contents('https://api.vk.com/method/board.getTopics?' . $get_params));
	return $result->response->items[0]->comments;
}

function get_random_comment() {
	global $group_id;
	global $access_token;
	global $topic_id;
	$request_params = array(
		'group_id' => $group_id,
		'topic_id' => $topic_id,
		'offset' => rand(1,get_comments_count() - 1),
		'count' => 1,
		'extended' => 1,
		'v' => '5.199',
		'access_token' => $access_token
	);
	$get_params = http_build_query($request_params);
	$result = json_decode(file_get_contents('https://api.vk.com/method/board.getComments?' . $get_params));
	return $result->response;
}

$data = get_random_comment();
$result = array(
	'date' => date('Y', $data->items[0]->date),
	'text' => $data->items[0]->text,
	'user' => $data->profiles[0]->first_name . ' ' . $data->profiles[0]->last_name,
);
?>
<?php

// get data from data.txt
if(!file_exists('data.txt')){
	file_put_contents('data.txt', json_encode(array()));
	$data = array();
} else {
	$data = json_decode(file_get_contents('data.txt'));
}


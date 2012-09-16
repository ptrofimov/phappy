<?php
require_once __DIR__ . '/../PHappy/PHappy.php';

(new Form(
	new Input('Enter your name', '#name'),
	new Button('Say hello', function($me) {
		$me->alert('Hello ' . $me->title);
	})
	))->run();





<?php
require_once __DIR__ . '/../PHappy/PHappy.php';

/*(new Form(
	new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	})
	))->run();*/

(new Form(
	new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->alert('Hello ' . $me->name);
	}),
	new Button('Capitalize name', function($me) {
		$me->name = strtoupper($me->name);
	}),
	new Button('Clear name', function($me) {
		$me->name = '';
	}),
	new CheckBox('Do you like #pizza?'),
	new Button('Check', function($me){
		if($me->pizza){
			$me->alert('You like pizza');
		}else{
			$me->alert('You don\'t like pizza');
		}
	}),
	new Button('Set checked', function($me){
		$me->pizza = true;
	}),
	new Button('Set unchecked', function($me){
		$me->pizza = false;
	})
	))->run();






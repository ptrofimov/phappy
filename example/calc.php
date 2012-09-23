<?php
require_once(__DIR__ . '/../PHappy/PHappy.php');

(new Page(
	new Heading('Simple calculator'),
	new Input('Enter #number'),
	function($me){
		foreach(range(0,9) as $n){
			$me->add(new Button($n, function($me){
				$me->number .= $me->this;
			}));
		}
	},
	function($me){
		foreach(array('+','-','*','/') as $o){
			$me->add(new Button($o, function($me){
				$me->alert($me->op);
				$me->op = $me->this;
				$me->temp = $me->number;
			}));
		}
	}
	))->run();
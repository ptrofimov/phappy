<?php
require_once(__DIR__ . '/../PHappy/PHappy.php');

(new Page(
	new Heading('Simple calculator'),
	new Input('Enter #number'),
	new Row(function($me){
			foreach(range(0,9) as $n){
				$me->add(new Button($n, function($me){
					if($me->op){
						$me->number = '';
					}
					$me->number .= $me->this;
				}));
			}
		}),
	function($me){
		foreach(array('+','-','*','/') as $o){
			$me->add(new Button($o, function($me){
				if($me->op){
					$me->op == '+' && $me->number += $me->temp;
					$me->op == '-' && $me->number -= $me->temp;
					$me->op == '*' && $me->number *= $me->temp;
					$me->op == '/' && $me->number /= $me->temp;
				}
				$me->op = $me->this;
				$me->temp = $me->number;
			}));
		}
	}
	))->run();
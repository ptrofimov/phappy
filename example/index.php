<?php
require_once __DIR__ . '/../PHappy/PHappy.php';

(new Page(
	new Header('First PHappy application', 4, '#id.class1.class2'),
	new Paragraph('Some text')
	))->run();



/*echo '123';

(new Page(
	'#page1',
	new Header('Page1'),
	new Button('Goto page 2', function($me){
		$me->show('#page2');
	})
	))->run();

(new Page(
	'#page2',
	new Header('Page2'),
	new Button('Goto page 1')
	))->run();
*/


/*(new Form(
	new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	})
	))->run();
*/

//(new Button('OK'))->run();

/*(new Form(
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
	}),
	new RadioButton(array(
		'cats' => 'I like cats',
		'dogs' => 'I like dogs'
		), '#pets')
	))->run();*/






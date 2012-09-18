<?php
require_once __DIR__ . '/../PHappy/PHappy.php';

(new Page(
	new Heading('[headings]', 4),
	new Heading('h1. Heading 1 (new Heading(title, 1))', 1),
	new Heading('h2. Heading 2 (new Heading(title, 2))', 2),
	new Heading('h3. Heading 3 (new Heading(title, 3))', 3),
	new Heading('h4. Heading 4 (new Heading(title, 4))', 4),
	new Heading('h5. Heading 5 (new Heading(title, 5))', 5),
	new Heading('h6. Heading 6 (new Heading(title, 6))', 6),
	new Heading('[paragraphs]', 4),
	new Paragraph('Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh. (new Paragraph(text, ".muted"))', '.muted'),
	new Paragraph('Etiam porta sem malesuada magna mollis euismod. (new Paragraph(text, ".text-warning"))', '.text-warning'),
	new Paragraph('Donec ullamcorper nulla non metus auctor fringilla. (new Paragraph(text, ".text-error"))', '.text-error'),
	new Paragraph('Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis. (new Paragraph(text, ".text-info"))', '.text-info'),	
	new Paragraph('Duis mollis, est non commodo luctus, nisi erat porttitor ligula. (new Paragraph(text, ".text-success"))', '.text-success'),
	new Heading('[unordered list `new UnorderedList(array)`]', 4),
	new UnorderedList(array('Lorem ipsum dolor sit amet', 'Consectetur adipiscing elit', 'Integer molestie lorem at massa', 'Facilisis in pretium nisl aliquet')),
	new Heading('[ordered list `new OrderedList(array)`]', 4),
	new OrderedList(array('Lorem ipsum dolor sit amet', 'Consectetur adipiscing elit', 'Integer molestie lorem at massa', 'Facilisis in pretium nisl aliquet')),
	new Heading('[unstyled list `new UnorderedList(array, ".unstyled")`]', 4),
	new UnorderedList(array('Lorem ipsum dolor sit amet', 'Consectetur adipiscing elit', 'Integer molestie lorem at massa', 'Facilisis in pretium nisl aliquet'), '.unstyled')
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






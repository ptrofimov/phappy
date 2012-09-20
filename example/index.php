<?php
require_once __DIR__ . '/../PHappy/PHappy.php';

$tableData = array(
	array('1', 'Mark', 'Otto', '@mdo'),
	array('2', 'Jacob', 'Thornton', '@fat'),
	array('3', 'Larry', 'the Bird', '@twitter'),
	);
$tableHeaders = array('#', 'First Name', 'Last Name', 'Username');

(new Page(
	'PHappy widgets',
	'#phappy',
	new Heading('[PHappy widgets]', 2),
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
	new UnorderedList(array('Lorem ipsum dolor sit amet', 'Consectetur adipiscing elit', 'Integer molestie lorem at massa', 'Facilisis in pretium nisl aliquet'), '.unstyled'),
	new Heading('[table `new Table(data, headers)`]', 4),
	new Table($tableData, $tableHeaders),
	new Heading('[buttons `new Button(label, [selector])`]', 4),
	new Button('Default', ''),
	new Button('Primary', '.btn-primary'),
	new Button('Info', '.btn-info'),
	new Button('Success', '.btn-success'),
	new Button('Warning', '.btn-warning'),
	new Button('Danger', '.btn-danger'),
	new Button('Inverse', '.btn-inverse'),
	new Button('Link', '.btn-link'),
	new Heading('[button with callback `new Button(label, [callback], [selector])`]', 4),
	new Button('Default', function($me){
		$me->alert('You pushed the button');
	}),
	new Heading('[input `new Input(label, [selector])`]', 4),
	new Input('Enter your #name'),
	new Button('Say hello', function($me){
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	}),
	new Heading('[checkbox `new CheckBox(label, [selector])`]', 4),
	new CheckBox('Do you like #pizza?'),
	new Button('Check', function($me){
		$me->alert($me->pizza ? 'You like pizza' : 'You don\'t like pizza');
		$me->pizza = false;
	}),
	new Heading('[radiobutton `new RadioButton(array, [selector])`]', 4),
	new RadioButton(array(
		'cats' => 'Do you like cats?',
		'dogs' => 'Do you like dogs?',
		), '#pets'),
	new Button('Check', function($me){
		$me->alert($me->pets == 'cats' ? 'You like cats' : 'You like dogs');
		$me->pets = 'cats';
	}),
	new Heading('[select `new Select(array, [multiple], [selector])`]', 4),
	new Select(array(
		'php' => 'PHP',
		'python' => 'Python',
		'perl' => 'Perl',
		'ruby' => 'Ruby',
		), '#language'),
	new Button('Check', function($me){
		$me->alert('You like ' . $me->language);
		$me->language = 'php';
	}),
	new Heading('[textarea `new Textarea([rows], [selector])`]', 4),
	new Textarea(3, '#message'),
	new Button('Check', function($me){
		$me->alert('You wrote: ' . $me->message);
		$me->message = 'Thank you!';
	}),
	new Heading('[console.log `$me->log(args)`]', 4),
	new Button('Console.log', function($me){
		$me->log('%s is %s!', 'PHP', 'good');
	}),
	new Heading('[redirect `$me->redirect(url)`]', 4),
	new Button('Go to wrong url', function($me){
		$me->redirect('/wrongurl');
	})
	))->run();


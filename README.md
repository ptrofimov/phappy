# PHappy

*Use PHappy and be happy: rapid PHP prototyping*

This is base for rapid PHP prototyping. No HTML, no CSS, no JS, only pure PHP.

**Just write few lines of PHP code:**

```php
(new Form(
  new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	})
	))->run();
```

**and get working application:**

![PHappy](https://raw.github.com/ptrofimov/phappy/master/example/picture.png)

### Notice

This is just the beginning. The outline. The project is in active development. 
If you wanna be a collaborator you are welcome. Write me to issues.

--------------------------------------------------------
*Tags:* phappy, php, prototyping

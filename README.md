# &#9786;&#9786;&#9786; PHappy! &#9786;&#9786;&#9786;

*Use PHappy and be happy: rapid PHP prototyping (pronounced as [pi`happi])*

This is base for rapid PHP prototyping. No HTML, no CSS, no JS, only pure PHP.

### 1. Just write few lines of PHP code:

```php
(new Form(
  new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	})
	))->run();
```

### 2. And get working application:

![PHappy](https://raw.github.com/ptrofimov/phappy/master/example/picture.png)

## Inside

- HTML5, jQuery, Bootstrap and PHP 5.4
- Generic Bootstrap controls
- Event handlers on server-side using all PHP functionality
- Bidirectional data exchange: form on client side <-> server event handler
- Javascript and CSS loaded via one public file

## Notice

This is just the beginning. The outline. The project is in active development. 
If you wanna be a collaborator you are welcome. Write me to issues.

--------------------------------------------------------
*Tags:* phappy, php, prototyping

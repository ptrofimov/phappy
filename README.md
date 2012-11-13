# PHappy!

*Use PHappy and be happy: quick PHP prototyping (pronounced as [pi`happi])*

This is base for quick PHP prototyping. No HTML, no CSS, no JS, just pure PHP.

## Quick start for quick prototyping

- Download [latest](https://github.com/ptrofimov/phappy/zipball/master) version of PHappy

- Include it in your script:

```php
require_once('PHappy/PHappy.php');
```
- Just write few lines of PHP code:

```php
(new Page(
	new Input('Enter your #name'),           # PHappy can extract ID from label
	new Button('Say hello', function($me) {  # Handler for click event (executed on server-side)
		$me->name = ucfirst($me->name);      # Easy to get values from page, easy to set
		$me->alert('Hello ' . $me->name);    # Available the most popular javascript and jQuery functions
	})
	))->run();
```

- Run the script in your browser and, wuala, get working application:

![PHappy - quick PHP prototyping](https://raw.github.com/ptrofimov/phappy/master/example/picture.png)

## Inside

- HTML5, jQuery, Bootstrap and PHP 5.4
- Generic Bootstrap controls
- Event handlers on server-side using all PHP functionality
- Bidirectional data exchange: form on client side <-> server event handler
- Javascript and CSS loaded via one public file

## Notice

If you wanna be a collaborator you are welcome. Write me to issues.

--------------------------------------------------------
*Tags:* phappy, php, prototyping

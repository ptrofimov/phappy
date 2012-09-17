# PHappy!!! :):):)

*Use PHappy and be happy: rapid PHP prototyping*

This is base for rapid PHP prototyping. No HTML, no CSS, no JS, only pure PHP.

## Example

```php
(new Form(
  new Input('Enter your #name'),
	new Button('Say hello', function($me) {
		$me->name = ucfirst($me->name);
		$me->alert('Hello ' . $me->name);
	})
	))->run();
```
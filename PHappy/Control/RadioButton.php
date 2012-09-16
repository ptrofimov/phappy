<?php
class RadioButton extends Control
{
	private $_items;

	public function __construct(array $items, $selector)
	{
		$this->_items = $items;
		parent::__construct('', $selector);
	}

	public function __toString()
	{
		$out = '';
		foreach($this->_items as $key => $value){
			$out .= sprintf('<label><input type="radio" name="%s" value="%s" /> %s</label>', $this->getId(), $key, htmlspecialchars($value));
		}
		return $out;
	}
}
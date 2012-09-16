<?php
class CheckBox extends Control
{
	private $_label;

	public function __construct($label='', $selector='')
	{
		$this->_label = str_replace('#', '', $label);
		parent::__construct($selector, $label);
	}

	public function __toString()
	{
		return sprintf('<label>%s <input type="checkbox" name="%s" id="%s" /></label>', $this->_label, $this->getId(), $this->getId());
	}
}
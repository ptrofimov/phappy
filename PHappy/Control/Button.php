<?php
class Button extends Control
{
	private $_label, $_onclick;

	public function __construct($label, $onclick)
	{
		$this->_label = $label;
		$this->_onclick = $onclick;
		parent::__construct();
	}

	public function onclick($me){
		$onclick = $this->_onclick;
		return $onclick($me);
	}

	public function __toString()
	{
		return sprintf('<button id="%s" class="btn" type="button">%s</button>', $this->getId(), $this->_label);
	}
}
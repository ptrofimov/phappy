<?php
/**
 * Button widget (<button>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Button extends Widget
{
	/**
	 * @var string
	 */
	private $_label = '';

	/**
	 * @var callback
	 */
	private $_onclick = null;

	/**
	 * __construct(label, [onclick], [selector])
	 */
	public function __construct($label)
	{
		$this->_label = $label;
		$args = func_get_args();
		$selector = '';
		if(isset($args[2])){
			$selector = $args[2];
		}
		if(isset($args[1])){
			if(is_callable($args[1])){
				$this->_onclick = $args[1];
			}else{
				$selector = $args[1];
			}
		}
		parent::__construct($selector, $label);
	}

	public function onclick($me){
		if(is_callable($this->_onclick)){
			$onclick = $this->_onclick;
			return $onclick($me);
		}
	}

	/**
	 * Renders widget
	 */
	public function run()
	{
		echo sprintf('<button id="%s" class="btn %s" type="button">%s</button>', $this->getId(), implode(' ', $this->getClasses()), $this->_label);
	}
}
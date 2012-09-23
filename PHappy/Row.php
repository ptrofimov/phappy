<?php
/**
 * Row widget (<div class="row">)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Row extends Container
{
	/**
	 * __construct([widgets])
	 */
	public function __construct(){
		$args = func_get_args();
		$this->add($args);
		parent::__construct();
	}

	public function run(){
		echo '<div class="row">';
		foreach($this->widgets() as $widget){
			echo '<div class="span1">';
			$widget->run();
			echo '</div>';
		}
		echo '</div>';
	}
}
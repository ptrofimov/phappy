<?php
/**
 * Page widget (HTML page)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Page extends Widget
{
	/**
	 * @var string
	 */
	private $_title = '';

	/**
	 * @var array
	 */
	private $_widgets = array();

	/**
	 * __construct([title], [selector], [widgets])
	 */
	public function __construct(){
		$args = func_get_args();
		$selector = '';
		if(isset($args[0]) && is_string($args[0])){
			if(isset($args[1]) && is_string($args[1])){
				$this->_title = $args[0];
			}elseif($args[0] && ($args[0][0] == '#' || $args[0][0] == '.')){
				$selector = $args[0];
			}
			unset($args[0]);
		}
		if(isset($args[1]) && is_string($args[1])){
			$selector = $args[1];
			unset($args[1]);
		}
		foreach($args as $item){
			if(! $item instanceof Widget){
				throw new Exception('Argument must be widget instance');
			}
			$this->_widgets[ $item->getId() ] = $item;
		}
		parent::__construct($selector, $this->_title);
	}

	public function getWidget($id){
		return isset($this->_widgets[$id]) ? $this->_widgets[$id] : null;
	}

	public function getWidgets(){
		return $this->_widgets;
	}

	public function run(){
		if(isset($_GET['css'])){
			header('Content-Type: text/css');
			readfile(__DIR__ . '/assets/bootstrap/bootstrap.css');
			exit;
		}elseif(isset($_GET['js'])){
			header('Content-Type: text/javascript');
			readfile(__DIR__ . '/assets/jquery/jquery.js');
			readfile(__DIR__ . '/assets/bootstrap/bootstrap.js');
			readfile(__DIR__ . '/assets/phappy/phappy.js');
			exit;
		}
		(new Mediator($this))->run();
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head><title>PHappy</title>';
		echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER['PHP_SELF'].'?css" />';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?js"></script>';
		echo '</head>';
		echo sprintf('<body id="%s" class="%s">', $this->getId(), implode(' ', $this->getClasses()));
		echo '<div class="container">';
		foreach($this->_widgets as $widget){
			$widget->run();
		}
		echo '</div>';
		echo '</body>';
		echo '</html>';
	}
}
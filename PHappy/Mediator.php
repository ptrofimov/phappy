<?php
/**
 * Mediator (connects client-side and server-side)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Mediator
{
	private $_page, $_list, $_values;

	public function __construct(Page $page){
		$this->_page = $page;
	}

	public function __get($key){
		return isset($this->_values[$key]) ? $this->_values[$key] : null;
	}

	public function __set($key, $value){
/*		if(!isset($this->_values[$key])){
			throw new Exception(sprintf('Invalid key "%s"', $key));
		}
*/		$this->_values[$key] = $value;
		$this->_list[] = sprintf('phappy.setValue("%s",%s)', $key, json_encode($value));
	}

	public function alert($msg)
	{
		$this->_list[] = sprintf('alert(%s)', json_encode($msg));
	}

	/**
	 * Outputs messages to console.log
	 */
	public function log()
	{
		$params = array();
		$args = func_get_args();
		foreach($args as $arg){
			$params[] = json_encode($arg);
		}
		$this->_list[] = sprintf('window.console && console.log(%s)', implode(',', $params));
	}

	/**
	 * Changes window.location
	 */
	public function redirect($url){
		$this->_list[] = sprintf('window.location = %s', json_encode($url));
	}

	/**
	 * Calls JQuery method "show"
	 *
	 * @param $selector string
	 */
	public function show($selector){
		$this->_list[] = sprintf('$(%s).show()', json_encode($selector));
	}

	/**
	 * Calls JQuery method "hide"
	 *
	 * @param $selector string
	 */
	public function hide($selector){
		$this->_list[] = sprintf('$(%s).hide()', json_encode($selector));
	}

	/**
	 * Calls JQuery method "toggle"
	 *
	 * @param $selector string
	 */
	public function toggle($selector){
		$this->_list[] = sprintf('$(%s).toggle()', json_encode($selector));
	}

	public function run(){
		if(isset($_GET['event'])){
			$this->_values = $_POST;
			$this->_page->getWidget($_GET['id'])->onclick($this);
			echo implode(';', $this->_list);
			exit;
		}
	}
}
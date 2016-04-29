<?php

namespace Amranidev\Lpackager\Parser;

/**
 * class NamespaceParser
 *
 * @package 
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class NamespaceParser 
{
	/**
	 * namespace
	 * 
	 * @var namespace
	 */  
	private $namespace;

	/**
	 * create new NamespaceParser
	 *
	 * @param String $namespace
	 */   
	public function __construct($namespace)
	{
		$this->namespace = $namespace;
	}

	/**
	 * get Controller Namespace
	 *
	 * @return mixed
	 */  
	public function controllerNameSpace()
	{
		$controllerNameSpace = $this->namespace . "/Http/Controllers";

		return str_replace('/', '\\', $controllerNameSpace);
	}

	/**
	 * get Namespace
	 * 
	 * @return mixed
	 */ 
	public function getNamespace()
	{
		return $this->namespace;
	}

}
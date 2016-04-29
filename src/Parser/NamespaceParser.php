<?php

namespace Amranidev\Lpackager\Parser;

class NamespaceParser 
{
	private $namespace;

	public function __construct($namespace)
	{
		$this->namespace = $namespace;
	}


	public function controllerNameSpace()
	{
		$controllerNameSpace = $this->namespace . "/Http/Controllers";

		return str_replace('/', '\\', $controllerNameSpace)
	}

	public function getNamespace()
	{
		return $this->namespace;
	}

}
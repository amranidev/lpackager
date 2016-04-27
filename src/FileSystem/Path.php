<?php

namespace Amranidev\lpackager\FileSystem;

class Path 
{
	/**
	 * package name
	 * 
	 * @var package
	 */ 
	private $package;
	private $path;
	private $namespace;

	public function __construct($package, $path, $namespace)
	{
		$this->package = $package;
		$this->path = $path;
		$this->namespace = $namespace;
	}

	public function root()
	{
		base_path() .'/'. $this->path .'/'.$this->package;
	}


}
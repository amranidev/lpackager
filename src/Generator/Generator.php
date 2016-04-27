<?php

namespace Amranidev\lpackager\Generator;

use Amranidev\lpackager\FileSystem\Path;
use Armandiev\Lpackager\FileSystem\Filesystem;

class Generator extends Filesystem
{
	private $path;

	public function __construct(Path $path)
	{
		$this->path = $path;
	}

}
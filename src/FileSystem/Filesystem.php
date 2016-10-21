<?php

namespace Amranidev\Lpackager\FileSystem;

class Filesystem extends \Exception
{
    /**
     * Make a file.
     *
     * @param $file
     * @param $content
     *
     * @throws FileAlreadyExists
     *
     * @return int
     */
    public function make($file, $content)
    {
        if ($this->exists($file)) {
            throw new \Exception('FileAlreadyExists');
        }

        return file_put_contents($file, $content);
    }

    /**
     * Determine if the file already exists.
     *
     * @param string $file
     *
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * Make directory.
     *
     * @param string $path
     *
     * @return void
     */
    public function makeDir($path)
    {
        if (is_dir($path)) {
            throw new \Exception('FileAlreadyExists');
        }
        mkdir($path, 0777, true);
    }

    /**
     * File append.
     *
     * @param string $path
     * @param string $content
     *
     * @return int
     */
    public function append($path, $content)
    {
        return file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }
}

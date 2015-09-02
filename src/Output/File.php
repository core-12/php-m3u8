<?php
/**
 * Project: php-m3u8-sdk
 * File: File.php 2015-08-18 13:40
 * ----------------------------------------------
 *
 * @author      Stanislav Kiryukhin <korsar.zn@gmail.com>
 * @copyright   Copyright (c) 2015, Core12 Team
 *
 * ----------------------------------------------
 * All Rights Reserved.
 * ----------------------------------------------
 */
namespace sKGroup\M3u\Output;


/**
 * Class File
 * @package sKGroup\M3u\Output
 */
class File extends Stream
{
    protected $path;
    protected $handle;

    public function __construct()
    {
        $this->path   = sys_get_temp_dir() . '/' .uniqid(time() . '_');
        $this->handle = fopen($this->path, 'w');

        parent::__construct($this->handle);
    }

    public function __destruct()
    {
        $this->close();

        if (is_file($this->path)) {
            unlink($this->path);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->path;
    }

    /**
     * @param $dist
     * @return bool
     */
    public function save($dist)
    {
        $this->close();
        return rename($this->path, $dist);
    }

    /**
     * @return void
     */
    protected function close()
    {
        fclose($this->handle);
    }
}

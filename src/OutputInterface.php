<?php
/**
 * Project: php-m3u8
 * File: OutputInterface.php 2015-08-18 13:40
 * ----------------------------------------------
 *
 * @author      Stanislav Kiryukhin <korsar.zn@gmail.com>
 * @copyright   Copyright (c) 2015, Core12 Team
 *
 * ----------------------------------------------
 * All Rights Reserved.
 * ----------------------------------------------
 */
namespace Core12\M3u8;

/**
 * Interface OutputInterface
 * @package Core12\M3u8
 */
interface OutputInterface
{
    /**
     * @param string $string
     */
    public function append($string);

    /**
     * @return string
     */
    public function getContents();
}

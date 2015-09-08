<?php
/**
 * Project: php-m3u8-sdk
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
namespace sKGroup\M3u;

/**
 * Interface OutputInterface
 * @package sKGroup\M3u
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

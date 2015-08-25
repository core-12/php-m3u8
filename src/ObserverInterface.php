<?php
/**
 * Project: php-m3u8-sdk
 * File: ObserverInterface.php 2015-08-25 14:53
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
 * Interface ObserverInterface
 * @package sKGroup\M3u
 */
interface ObserverInterface
{
    /**
     * @param $method
     * @param PlaylistInterface $playlist
     * @param null $data
     */
    public function handleEvent($method, PlaylistInterface $playlist, $data = null);
}

<?php
/**
 * Project: php-m3u8-sdk
 * File: ObservableInterface.php 2015-08-25 14:48
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
 * Interface ObservableInterface
 * @package sKGroup\M3u
 */
interface ObservableInterface
{
    /**
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function attachObserver(ObserverInterface $observer);

    /**
     * @param ObserverInterface $observer
     */
    public function detachObserver(ObserverInterface $observer);
}

<?php
/**
 * Project: php-m3u8-sdk
 * File: PlaylistInterface.php 2015-08-17 19:35
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

use sKGroup\M3u\Entity\Segment;

/**
 * Interface PlaylistInterface
 * @package sKGroup\M3u
 */
interface PlaylistInterface
{
    const TYPE_EVENT = 'EVENT';
    const TYPE_VOD   = 'VOD';

    /**
     * @return int
     */
    public function getVersion();

    /**
     * @param int $version
     */
    public function setVersion($version);

    /**
     * @return int
     */
    public function getTargetDuration();

    /**
     * @param $duration
     */
    public function setTargetDuration($duration);

    /**
     * @param string $uri
     * @param int $duration
     * @param null $title
     */
    public function addSegment($uri, $duration = -1, $title = null);

    /**
     * @param $n
     * @return bool
     */
    public function getSegment($n);

    /**
     * @return array
     */
    public function getSegments();

    /**
     * @param int $sequence
     */
    public function setMediaSequence($sequence);

    /**
     * @return int
     */
    public function getMediaSequence();

    /**
     * @param $type
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getType();
}

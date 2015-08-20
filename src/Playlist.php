<?php
/**
 * Project: php-m3u8-sdk
 * File: Playlist.php 2015-08-17 19:15
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
 * Class Playlist
 * @package sKGroup\M3u
 */
class Playlist implements PlaylistInterface
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var array
     */
    private $segments = [];

    /**
     * @var int
     */
    private $targetDuration = 0;


    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getTargetDuration()
    {
        return $this->targetDuration;
    }

    /**
     * @param $duration
     */
    public function setTargetDuration($duration)
    {
        $this->targetDuration = $duration;
    }


    /**
     * @param string|array $uri
     * @param int $duration
     * @param null $title
     */
    public function addSegment($uri, $duration = -1, $title = null)
    {
        $this->segments[] = [
            'uri'       => $uri,
            'duration'  => $duration,
            'title'     => $title
        ];

        // auto detect MAX duration
        if ($duration > 0 && ($v = ceil($duration)) > $this->getTargetDuration()) {
            $this->setTargetDuration($v);
        }
    }

    /**
     * @param $n
     * @return bool
     */
    public function getSegment($n)
    {
        if (isset($this->segments[$n])) {
            return $this->segments[$n];
        }

        return false;
    }

    /**
     * @return array
     */
    public function getSegments()
    {
        return $this->segments;
    }
}
